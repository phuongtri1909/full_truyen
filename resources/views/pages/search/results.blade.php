@extends('layouts.app')

@section('title')
    @if (isset($isSearch) && $isSearch)
        Kết quả tìm kiếm: {{ $query }}
    @else
        {{ $currentCategory->name }}
    @endif
@endsection

@section('description')
    @if (isset($isSearch) && $isSearch)
        Kết quả tìm kiếm cho "{{ $query }}" tại {{ config('app.name') }}
    @else
        Truyện thể loại {{ $currentCategory->name }} tại {{ config('app.name') }}
    @endif
@endsection

@section('content')
    <div class="mt-5 container-xl">
        <div class="row">
            <!-- Main content area (8 columns) -->
            <div class="col-12 col-md-7 col-lg-8">
                <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                    <h2 class="h4 mb-3 fw-bold">
                        @if (isset($isSearch) && $isSearch)
                            <i class="fa-solid fa-magnifying-glass fa-lg text-warning"></i>
                            Kết quả tìm kiếm: "{{ $query }}"
                        @else
                            <i class="fa-solid fa-layer-group fa-lg text-primary"></i>
                            Truyện thể loại: {{ $currentCategory->name }}
                        @endif
                    </h2>

                    @if ($stories->total() > 0)
                        <p class="text-muted small">Tìm thấy {{ $stories->total() }} truyện</p>
                    @else
                        <p class="text-muted">Không tìm thấy truyện phù hợp</p>
                    @endif

                    @foreach ($stories as $story)
                        <div class="story-item border-bottom pb-3 pt-3">
                            <div class="row">
                                <div class="col-3 col-md-2">
                                    <a href="{{ route('stories.show', $story) }}">
                                        <img src="{{ Storage::url($story->cover_medium) }}" alt="{{ $story->title }}"
                                            class="img-fluid rounded"
                                            style="width: 100%; height: 120px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="col-9 col-md-10">
                                    <h6 class="h6 mb-1">
                                        <a href="{{ route('show.page.story', $story->slug) }}"
                                            class="text-dark text-decoration-none">
                                            {{ $story->title }}
                                        </a>
                                    </h6>
                                    <div class="categories mb-2">
                                        @foreach ($story->categories as $category)
                                            <a href="{{ route('categories.story.show', $category->slug) }}"
                                                class="category-tag text-decoration-none">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="d-flex small text-muted">
                                        <div class="me-3">
                                            <i class="fas fa-book-open me-1 text-danger"></i>
                                            {{ $story->chapters_count ?? $story->chapters->count() }} chương
                                        </div>
                                        <div class="me-3">
                                            <i class="fas fa-eye me-1 text-primary"></i> {{ number_format($story->view_count) }}
                                        </div>
                                        <div>
                                            <i class="fas fa-clock me-1 text-warning"></i> {{ $story->updated_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="story-description mt-2 small text-muted d-none d-md-block">
                                        {{ Str::limit($story->description, 150) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center mt-4">
                        <x-pagination :paginator="$stories" />
                    </div>
                </div>
            </div>

            <!-- Sidebar (4 columns) - Now using the component -->
            <div class="col-12 col-md-5 col-lg-4">

                <div class="mb-4">
                    @include('components.recent-reads')
                </div>
                <div class="mb-4">
                    <x-categories-widget 
                        :categories="$categories" 
                        :current-category="$currentCategory ?? null" 
                        :is-search="$isSearch ?? false" 
                    />
                </div>
            </div>
        </div>
    </div>
@endsection