<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Rating;
use App\Models\Chapter;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ChapterController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Chapter::query();

        $totalChapters = Chapter::count();
        $publishedChapters = Chapter::where('status', 'published')->count();
        $draftChapters = Chapter::where('status', 'draft')->count();

        if ($search) {
            $searchNumber = preg_replace('/[^0-9]/', '', $search); // Extract numbers only

            $query->where(function ($q) use ($search, $searchNumber) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('number', 'like', "%$search%");

                if (is_numeric($searchNumber)) {
                    $q->orWhere('number', '=', (int)$searchNumber);
                }
            });
        }

        $chapters = $query->orderBy('number', 'DESC')->paginate(15);

        foreach ($chapters as $chapter) {
            $content = strip_tags($chapter->content);
            $chapter->content = mb_substr($content, 0, 97, 'UTF-8') . '...';
        }

        $status = Status::first();

        return view('admin.pages.chapters.index', compact(
            'chapters',
            'totalChapters',
            'publishedChapters',
            'draftChapters',
            'status'
        ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $latestChapterNumber = Chapter::max('number') ?? 0;
        $nextChapterNumber = $latestChapterNumber + 1;

        return view('admin.pages.chapters.create', compact('nextChapterNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baseSlug = 'chuong-' . $request->number;

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'number' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (Chapter::where('number', $value)->exists()) {
                        $fail('Chương ' . $value . ' đã tồn tại');
                    }
                },
                'integer',
            ],
            'status' => 'required|in:draft,published',
        ], [
            'title.required' => 'Tên chương không được để trống',
            'content.required' => 'Nội dung chương không được để trống',
            'number.required' => 'Số chương không được để trống',
            'number.integer' => 'Số chương phải là số nguyên',
            'status.required' => 'Trạng thái chương không được để trống',
            'status.in' => 'Trạng thái chương không hợp lệ',
        ]);

        try {

            $testSlug = 'chuong-' . $request->number . '-' . Str::slug($request->title);

            $chapter = new Chapter();
            $chapter->slug = $testSlug;
            $chapter->title = $request->title;
            $chapter->content = $request->content;
            $chapter->number = $request->number;
            $chapter->status = $request->status;
            $chapter->updated_content_at = now();

            $chapter->save();

            return redirect()->route('chapters.index')->with('success', 'Tạo chương ' . $request->number . ' thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($chapter)
    {
        $chapter = Chapter::find($chapter);
        if (!$chapter) {
            return redirect()->route('chapters.index')->with('error', 'Không tìm thấy chương này');
        }
        return view('admin.pages.chapters.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $chapter)
    {

        $chapter = Chapter::find($chapter);

        if (!$chapter) {
            return redirect()->route('chapters.index')->with('error', 'Không tìm thấy chương này');
        }

        $baseSlug = 'chuong-' . $request->number;

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'number' => [
                'required',
                function ($attribute, $value, $fail) use ($chapter) {
                    if (Chapter::where('number', $value)
                        ->where('id', '!=', $chapter->id)
                        ->exists()
                    ) {
                        $fail('Chương số ' . $value . ' đã tồn tại');
                    }
                },
                'integer',
            ],
            'status' => 'required|in:draft,published',
        ], [
            'title.required' => 'Tên chương không được để trống',
            'content.required' => 'Nội dung chương không được để trống',
            'number.required' => 'Số chương không được để trống',
            'number.integer' => 'Số chương phải là số nguyên',
            'status.required' => 'Trạng thái chương không được để trống',
            'status.in' => 'Trạng thái chương không hợp lệ',
        ]);

        try {

            $testSlug = 'chuong-' . $request->number . '-' . Str::slug($request->title);
            $chapter->slug = $testSlug;
            $chapter->title = $request->title;
            $chapter->content = $request->content;
            $chapter->number = $request->number;
            $chapter->status = $request->status;
            $chapter->updated_content_at = now();

            $chapter->save();

            return redirect()->route('chapters.index')->with('success', 'Cập nhật chương ' . $request->number . ' thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($chapter)
    {
        if (!$chapter) {
            return redirect()->route('chapters.index')->with('error', 'Không tìm thấy chương này');
        }

        try {
            Chapter::destroy($chapter);
            return redirect()->route('chapters.index')->with('success', 'Xóa chương thành công');
        } catch (\Exception $e) {
            return redirect()->route('chapters.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
    }
}
