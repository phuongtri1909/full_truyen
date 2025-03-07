<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with(['user', 'categories'])
            ->withCount('chapters')
            ->latest()
            ->paginate(10);
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

        $coverPath = $request->file('cover')->store('covers', 'public');

        $story = Story::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status,
            'cover' => $coverPath,
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

        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($story->cover);
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        $story->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status,
            'cover' => $request->hasFile('cover') ? $coverPath : $story->cover,
        ]);

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