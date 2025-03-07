<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Story;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{

    private function processAndSaveImage($imageFile)
    {
        $now = Carbon::now();
        $yearMonth = $now->format('Y/m');
        $timestamp = $now->format('YmdHis');
        $randomString = Str::random(8);
        $fileName = "{$timestamp}_{$randomString}";

        // Create directories if they don't exist
        Storage::disk('public')->makeDirectory("covers/{$yearMonth}/original");
        Storage::disk('public')->makeDirectory("covers/{$yearMonth}/medium");
        Storage::disk('public')->makeDirectory("covers/{$yearMonth}/thumbnail");

        // Process original image
        $originalImage = Image::make($imageFile);
        $originalImage->encode('webp', 90);
        Storage::disk('public')->put(
            "covers/{$yearMonth}/original/{$fileName}.webp",
            $originalImage->stream()
        );

        // Process medium size (400x300)
        $mediumImage = Image::make($imageFile);
        $mediumImage->fit(400, 300, function ($constraint) {
            $constraint->aspectRatio();
        });
        $mediumImage->encode('webp', 80);
        Storage::disk('public')->put(
            "covers/{$yearMonth}/medium/{$fileName}.webp",
            $mediumImage->stream()
        );

        // Process thumbnail (60x80)
        $thumbnailImage = Image::make($imageFile);
        $thumbnailImage->fit(60, 80, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnailImage->encode('webp', 70);
        Storage::disk('public')->put(
            "covers/{$yearMonth}/thumbnail/{$fileName}.webp",
            $thumbnailImage->stream()
        );

        return [
            'original' => "covers/{$yearMonth}/original/{$fileName}.webp",
            'medium' => "covers/{$yearMonth}/medium/{$fileName}.webp",
            'thumbnail' => "covers/{$yearMonth}/thumbnail/{$fileName}.webp"
        ];
    }

    public function index()
    {
        $stories = Story::with(['user', 'categories'])
            ->withCount('chapters')
            ->latest()
            ->paginate(15);
        return view('admin.pages.story.index', compact('stories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.story.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:stories|max:255',
            'description' => 'required',
            'categories' => 'required|array',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $coverPaths = $this->processAndSaveImage($request->file('cover'));

        $story = Story::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status,
            'cover' => $coverPaths['original'],
            'cover_medium' => $coverPaths['medium'],
            'cover_thumbnail' => $coverPaths['thumbnail'],
        ]);

        $story->categories()->attach($request->categories);

        return redirect()->route('stories.index')
            ->with('success', 'Truyện đã được tạo thành công.');
    }

    public function edit(Story $story)
    {
        $categories = Category::all();
        return view('admin.pages.story.edit', compact('story', 'categories'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required|max:255|unique:stories,title,' . $story->id,
            'description' => 'required',
            'categories' => 'required|array',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status,
        ];

        if ($request->hasFile('cover')) {
            // Delete old images
            Storage::disk('public')->delete([
                $story->cover,
                $story->cover_medium,
                $story->cover_thumbnail
            ]);

            // Process and save new images
            $coverPaths = $this->processAndSaveImage($request->file('cover'));
            $data['cover'] = $coverPaths['original'];
            $data['cover_medium'] = $coverPaths['medium'];
            $data['cover_thumbnail'] = $coverPaths['thumbnail'];
        }

        $story->update($data);
        $story->categories()->sync($request->categories);

        return redirect()->route('stories.index')
            ->with('success', 'Truyện đã được cập nhật thành công.');
    }

    public function destroy(Story $story)
    {
        Storage::disk('public')->delete($story->cover);
        $story->categories()->detach();
        $story->chapters()->delete();
        $story->delete();

        return redirect()->route('stories.index')
            ->with('success', 'Truyện đã được xóa thành công.');
    }
}