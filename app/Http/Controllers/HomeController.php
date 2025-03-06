<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Socials;
use App\Models\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Initialize base query
        $query = Chapter::query();

        // Visibility check based on user role
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'mod'])) {
            $query->where('status', 'published');
        }

        // Calculate chapter ranges starting from oldest chapters
        $maxNumber = Chapter::max('number') ?? 0;
        $minNumber = Chapter::min('number') ?? 0;
        $ranges = [];

        // Calculate total complete chunks
        $totalChunks = ceil($maxNumber / 100);

        // Create ranges from bottom up
        for ($i = 1; $i <= $totalChunks; $i++) {
            $start = min($i * 100, $maxNumber);
            $end = max(($i - 1) * 100 + 1, $minNumber);
            $ranges[] = [
                'start' => $start,
                'end' => $end
            ];
        }

        // Reverse array to show newest chapters first
        $ranges = array_reverse($ranges);

        // Handle search
        if ($request->search) {
            $searchQuery = Chapter::query();

            // Reapply visibility for search
            if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'mod'])) {
                $searchQuery->where('status', 'published');
            }

            $search = $request->search;
            $searchNumber = preg_replace('/[^0-9]/', '', $search);

            $searchQuery->where(function ($q) use ($search, $searchNumber) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");

                if ($searchNumber !== '') {
                    $q->orWhere('number', $searchNumber);
                }
            });

            $query = $searchQuery;
        }
        // Handle range filtering if not searching
        else if ($request->start && $request->end) {
            $query->whereBetween('number', [(int)$request->end, (int)$request->start]);
        }
        // Default to latest 100 chapters
        else {
            $query->where('number', '<=', $maxNumber)
                ->where('number', '>', $maxNumber - 100);
        }

        // Apply sorting
        $isOldFirst = filter_var($request->old_first, FILTER_VALIDATE_BOOLEAN);
        $orderDirection = $isOldFirst ? 'asc' : 'desc';
        $chapters = $query->orderBy('number', $orderDirection)->get();



        // Get pinned comments separately
        $pinnedComments = Comment::with(['user', 'replies.user', 'reactions'])
            ->whereNull('reply_id')
            ->where('is_pinned', true)
            ->latest()
            ->get();

        // Get regular comments with pagination
        $regularComments = Comment::with(['user', 'replies.user', 'reactions'])
            ->whereNull('reply_id')
            ->where('is_pinned', false)  // Explicitly exclude pinned comments
            ->latest()
            ->paginate(10);

        // Handle AJAX requests
        if ($request->ajax()) {
            if ($request->type === 'comments') {
                // Only include pinned comments on first page
                $showPinned = $request->page == 1;
                
                return response()->json([
                    'html' => view('components.comments-list', [
                        'pinnedComments' => $showPinned ? $pinnedComments : collect([]),
                        'regularComments' => $regularComments
                    ])->render(),
                    'hasMore' => $regularComments->hasMorePages()
                ]);
            }

            return response()->json([
                'html' => view('components.chapter-items', compact('chapters'))->render()
            ]);
        }

         // Return view with all data
        return view('pages.home', compact(
            'chapters',
            'pinnedComments',
            'regularComments',
            'ranges'
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
