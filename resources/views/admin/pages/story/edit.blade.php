@extends('admin.layouts.app')

@section('content-auth')
    <div class="row">
        <div class="col-12">
            <div class="card mb-0 mx-0 mx-md-4 mb-md-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Chỉnh sửa truyện</h5>
                </div>
                <div class="card-body">
                    @include('admin.pages.components.success-error')

                    <form action="{{ route('stories.update', $story) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $story->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" id="description" rows="5"
                                        class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $story->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cover">Ảnh bìa</label>
                                    <input type="file" name="cover" id="cover"
                                        class="form-control @error('cover') is-invalid @enderror"
                                        onchange="previewImage(this)">
                                    <div id="cover-preview" class="mt-2">
                                        @if ($story->cover)
                                            <img src="{{ Storage::url($story->cover) }}" class="img-thumbnail"
                                                style="max-height: 200px">
                                        @endif
                                    </div>
                                    @error('cover')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="categories">Thể loại (tối đa 4)</label>
                                    <select name="categories[]" id="categories" class="form-control" multiple required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ in_array($category->id, $story->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Chọn tối đa 4 thể loại</small>
                                    <div class="invalid-feedback category-limit-error" style="display: none;">
                                        Bạn chỉ được chọn tối đa 4 thể loại
                                    </div>
                                    @error('categories')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="draft" {{ $story->status === 'draft' ? 'selected' : '' }}>Bản nháp
                                        </option>
                                        <option value="published" {{ $story->status === 'published' ? 'selected' : '' }}>
                                            Xuất bản</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="d-flex align-items-center">
                                        <label class="mb-0 me-3" for="completed">Truyện đã hoàn thành</label>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="completed" class="form-check-input" id="completed"
                                                role="switch" {{ $story->completed ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn bg-gradient-primary">Cập nhật</button>
                                <a href="{{ route('stories.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts-admin')
    <script>
        function previewImage(input) {
            const preview = document.getElementById('cover-preview');
            preview.innerHTML = '';

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'mt-2');
                    img.style.maxHeight = '200px';
                    preview.appendChild(img);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const MAX_CATEGORIES = 4;
            const categoriesSelect = document.getElementById('categories');
            const categoryLimitError = document.querySelector('.category-limit-error');
            const submitButton = document.querySelector('button[type="submit"]');

            // Check initial state
            checkCategoryLimit();

            categoriesSelect.addEventListener('change', checkCategoryLimit);

            function checkCategoryLimit() {
                const selectedOptions = Array.from(categoriesSelect.selectedOptions);

                if (selectedOptions.length > MAX_CATEGORIES) {
                    categoryLimitError.style.display = 'block';
                    submitButton.disabled = true;

                    // Deselect the last selected option
                    for (let i = MAX_CATEGORIES; i < selectedOptions.length; i++) {
                        selectedOptions[i].selected = false;
                    }
                } else {
                    categoryLimitError.style.display = 'none';
                    submitButton.disabled = false;
                }
            }

            // Form validation before submit
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                const selectedOptions = Array.from(categoriesSelect.selectedOptions);

                if (selectedOptions.length > MAX_CATEGORIES) {
                    event.preventDefault();
                    categoryLimitError.style.display = 'block';
                    return false;
                }

                if (selectedOptions.length === 0) {
                    event.preventDefault();
                    categoriesSelect.classList.add('is-invalid');
                    return false;
                }

                return true;
            });
        });
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            on: {
                change: function(evt) {
                    this.updateElement();
                }
            },
            height: 200,
            removePlugins: 'uploadimage,image2,uploadfile,filebrowser',
        });
    </script>
@endpush

@push('styles')
    <style>
        .form-switch .form-check-input {
            width: 3em;
            height: 1.5em;
            cursor: pointer;
        }

        .form-switch .form-check-input:checked {
            background-color: #2dce89;
            border-color: #2dce89;
        }

        .form-switch .form-check-input:focus {
            border-color: rgba(45, 206, 137, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(45, 206, 137, 0.25);
        }
    </style>
@endpush
