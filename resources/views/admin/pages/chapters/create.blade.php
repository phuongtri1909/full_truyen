@extends('admin.layouts.app')

@push('styles-admin')
<!-- Thêm các style tùy chỉnh nếu cần -->
@endpush

@section('content-auth')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">Tạo chương</h5>
            </div>
            <div class="card-body pt-4 p-3">

                @include('admin.pages.components.success-error')

                <form action="{{ route('chapters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number">Số chương</label>
                                <input type="number" name="number" id="number" class="form-control"
                                    value="{{ old('number',$nextChapterNumber ) }}" required>
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="views">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="published">Hiển thị</option>
                                    <option value="draft">Viết nháp</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Tên chương</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title' ) }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" class="form-control" rows="5"
                                    required>{{ old('content') }}</textarea>
                                @error('content-')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn bg-gradient-primary">Lưu</button>
                            <a href="{{ route('chapters.index') }}" class="btn btn-secondary">Trở về</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts-admin')

@endpush
