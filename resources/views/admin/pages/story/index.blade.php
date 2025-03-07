@extends('admin.layouts.app')

@section('content-auth')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Danh sách truyện</h5>
                    <a href="{{ route('stories.create') }}" class="btn bg-gradient-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Thêm truyện mới
                    </a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @include('admin.pages.components.success-error')
                
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ảnh bìa</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiêu đề</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tác giả</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thể loại</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số chương</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stories as $story)
                            <tr>
                                <td class="text-center">{{ $story->id }}</td>
                                <td>
                                    <img src="{{ Storage::url($story->cover) }}" class="avatar avatar-sm me-3">
                                </td>
                                <td>{{ $story->title }}</td>
                                <td>{{ $story->user->name }}</td>
                                <td>
                                    @foreach($story->categories as $category)
                                        <span class="badge badge-sm bg-gradient-info">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $story->chapters_count }}</td>
                                <td>
                                    <span class="badge badge-sm bg-gradient-{{ $story->status === 'published' ? 'success' : 'secondary' }}">
                                        {{ $story->status === 'published' ? 'Đã xuất bản' : 'Bản nháp' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('stories.edit', $story) }}" class="btn btn-link text-dark px-3 mb-0">
                                        <i class="fas fa-pencil-alt text-dark me-2"></i>Sửa
                                    </a>
                                    <form action="{{ route('stories.destroy', $story) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa truyện này?');">
                                            <i class="far fa-trash-alt me-2"></i>Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">Không có truyện nào</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-4 pt-4">
                    {{ $stories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection