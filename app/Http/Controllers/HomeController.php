<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Story;
use App\Models\Rating;
use App\Models\Status;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Socials;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        // Get hot stories
        $hotStories = $this->getHotStories($request);

        // Get new stories
        $newStories = $this->getNewStories($request);

        // Get completed stories
        $completedStories = Story::with(['chapters' => function($query) {
                $query->select('id', 'story_id', 'number')
                      ->latest();
            }, 'categories'])
            ->published()
            ->where('completed', true) // Using the completed column
            ->withCount(['chapters' => function($query) {
                $query->published();
            }])
            ->whereHas('chapters', function($query) {
                $query->published();
            })
            ->select([
                'id',
                'title',
                'slug',
                'cover',
                'completed',
                'updated_at'
            ])
            ->latest('updated_at')
            ->take(18)
            ->get();

        // Handle AJAX requests
        if ($request->ajax()) {
            if ($request->type === 'hot') {
                return response()->json([
                    'html' => view('components.stories-grid', compact('hotStories'))->render()
                ]);
            } elseif ($request->type === 'new') {
                return response()->json([
                    'html' => view('components.story-list-items', compact('newStories'))->render()
                ]);
            }
        }

        return view('pages.home', compact('hotStories', 'newStories', 'completedStories'));
    }

    private function getHotStories($request)
    {
        // Move existing hot stories logic here
        $query = Story::with(['chapters' => function ($query) {
            $query->select('id', 'story_id', 'views', 'created_at');
        }])
        ->published()
        ->withCount(['chapters' => function ($query) {
            $query->published();
        }])
        ->whereHas('chapters', function ($query) {
            $query->published();
        })
        ->select([
            'id',
            'title',
            'slug',
            'cover',
            'description',
            'created_at',
            'updated_at'
        ])
        ->where('updated_at', '>=', now()->subDays(30));

        // Apply category filter if selected
        if ($request->category_id) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        $hotStories = $query->get()
            ->map(function ($story) {
                $story->hot_score = $this->calculateHotScore($story);
                return $story;
            })
            ->sortByDesc('hot_score')
            ->take(12);

        return $hotStories;
    }

    private function calculateHotScore($story)
    {
        // Get total views of all chapters
        $totalViews = $story->chapters->sum('views');

        // Get average views per chapter
        $avgViews = $story->chapters_count > 0 ?
            $totalViews / $story->chapters_count : 0;

        // Get views in last 7 days
        $recentViews = $story->chapters()
            ->where('created_at', '>=', now()->subDays(7))
            ->sum('views');

        // Calculate chapter frequency (chapters per day)
        $daysActive = max(1, $story->created_at->diffInDays(now()));
        $chapterFrequency = $story->chapters_count / $daysActive;

        // Calculate recency boost (newer stories get higher scores)
        $daysSinceLastUpdate = $story->updated_at->diffInDays(now());
        $recencyBoost = 1 + (1 / max(1, $daysSinceLastUpdate));

        // Calculate final score using weighted factors
        $score = (
            ($totalViews * 0.3) +
            ($avgViews * 0.2) +
            ($recentViews * 0.25) +
            ($chapterFrequency * 15) +
            ($story->chapters_count * 5)
        ) * $recencyBoost;

        return $score;
    }

    private function getNewStories($request)
    {
        $query = Story::with(['chapters' => function($query) {
                $query->select('id', 'story_id', 'title', 'number', 'views', 'created_at')
                      ->latest();
            }, 'categories'])
            ->published()
            ->withCount(['chapters' => function($query) {
                $query->published();
            }])
            ->whereHas('chapters', function($query) {
                $query->published();
            })
            ->select([
                'id',
                'title',
                'slug',
                'cover',
                'status'
            ])
            ->whereHas('chapters', function($query) {
                $query->where('created_at', '>=', now()->subDays(30));
            });

        if ($request->category_id) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        return $query->orderByDesc(function($query) {
                $query->select('created_at')
                      ->from('chapters')
                      ->whereColumn('story_id', 'stories.id')
                      ->latest()
                      ->limit(1);
            })
            ->take(20)
            ->get();
    }

    public function showStory(Request $request, $slug)
    {
        $story = Story::where('slug', $slug)->firstOrFail();

        // Eager load necessary relationships
        $story->load(['categories']);

        // Get chapters with pagination
        $chapters = Chapter::where('story_id', $story->id)
            ->published()
            ->orderBy('number', 'desc')
            ->paginate(20); // Show 20 chapters per page

        // Calculate stats
        $stats = [
            'total_chapters' => Chapter::where('story_id', $story->id)->published()->count(),
            'total_views' => Chapter::where('story_id', $story->id)->sum('views'),
            'ratings' => [
                'count' => Rating::where('story_id', $story->id)->count(),
                'average' => Rating::where('story_id', $story->id)->avg('rating') ?? 0
            ]
        ];

        // Get story status
        $status = (object)[
            'status' => $story->completed ? 'done' : 'ongoing'
        ];

        // Get category list with story count
        $storyCategories = $story->categories->map(function($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
            ];
        });

        // Prepare chapters pagination and ranges
        $chapters = $story->chapters()
            ->published()
            ->orderBy('number', 'desc')
            ->paginate(50);

        // Calculate chapter ranges for dropdown
        $totalChapters = $story->chapters()->published()->count();
        $rangeSize = 50;
        $ranges = [];
        
        for ($i = 1; $i <= $totalChapters; $i += $rangeSize) {
            $ranges[] = [
                'start' => $i,
                'end' => min($i + $rangeSize - 1, $totalChapters)
            ];
        }

        // Get comments
        $pinnedComments = Comment::with('user')
            ->where('story_id', $story->id)
            ->where('is_pinned', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $regularComments = Comment::with('user')
            ->where('story_id', $story->id)
            ->where('is_pinned', false)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        
        
        return view('pages.story', compact(
            'story',
            'stats',
            'status',
            'chapters',
            'ranges',
            'pinnedComments',
            'regularComments',
            'storyCategories' // Add this to the view data
        ));
    }

    public function chapter($slug)
    {
        $query = Chapter::where('slug', $slug);

        if (auth()->check()) {
            if (in_array(auth()->user()->role, ['admin', 'mod'])) {
                // Admin and mod can see all chapters
                $chapter = $query->firstOrFail();
            } else {
                // Regular users can only see published chapters
                $chapter = $query->where('status', 'published')->firstOrFail();
            }
        } else {
            // Guests can only see published chapters
            $chapter = $query->where('status', 'published')->firstOrFail();
        }

        // Get client IP
        $ip = request()->ip();
        $sessionKey = "chapter_view_{$chapter->id}_{$ip}";

        if (!session()->has($sessionKey)) {
            $chapter->increment('views');
            session([$sessionKey => true]);
            session()->put($sessionKey, true, 1440);
        }

        $chapter->count = User::whereNotNull('rating')->count();
        $chapter->stars = round(User::whereNotNull('rating')->avg('rating'), 1) ?? 0;

        $wordCount = str_word_count(strip_tags($chapter->content), 0, 'àáãạảăắằẳẵặâấầẩẫậèéẹẻẽêềếểễệđìíĩỉịòóõọỏôốồổỗộơớờởỡợùúũụủưứừửữựỳýỵỷỹ');
        $chapter->word_count = $wordCount;

        $nextChapterQuery = Chapter::where('number', '>', $chapter->number)
            ->orderBy('number', 'asc');

        $prevChapterQuery = Chapter::where('number', '<', $chapter->number)
            ->orderBy('number', 'desc');

        // Apply published filter for non-admin/mod users    
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'mod'])) {
            $nextChapterQuery->where('status', 'published');
            $prevChapterQuery->where('status', 'published');
        }

        $nextChapter = $nextChapterQuery->first();
        $prevChapter = $prevChapterQuery->first();

        $recentChaptersQuery = Chapter::where('id', '!=', $chapter->id)
            ->orderBy('number', 'desc')
            ->take(5);

        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'mod'])) {
            $recentChaptersQuery->where('status', 'published');
        }

        $recentChapters = $recentChaptersQuery->get();

        return view('pages.chapter', compact(
            'chapter',
            'nextChapter',
            'prevChapter',
            'recentChapters'
        ));
    }

    public function searchChapters(Request $request)
    {
        $searchTerm = $request->search;
        $query = Chapter::query();

        // Visibility check
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'mod'])) {
            $query->where('status', 'published');
        }

        if ($searchTerm) {
            $searchNumber = preg_replace('/[^0-9]/', '', $searchTerm);

            $query->where(function ($q) use ($searchTerm, $searchNumber) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");

                if ($searchNumber !== '') {
                    $q->orWhere('number', $searchNumber);
                }
            });
        }

        $chapters = $query->orderBy('number', 'desc')->get();

        return response()->json([
            'html' => view('components.search-results', compact('chapters'))->render()
        ]);
    }
}
