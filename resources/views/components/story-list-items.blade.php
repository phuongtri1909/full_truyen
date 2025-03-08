@foreach ($newStories as $story)
    <div class="story-item p-3 border-bottom">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="{{ Storage::url($story->cover) }}" class="story-thumb"
                    alt="{{ $story->title }}">
                <div class="ms-3">
                    <h6 class="story-title">
                        <a href="{{ route('stories.show', $story->slug) }}">{{ $story->title }}</a>
                    </h6>
                    <div>
                        @foreach ($story->categories as $category)
                            <span class="category-tag">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <div class="story-meta mb-1">
                    <span class="text-muted me-3">
                        <i class="fas fa-book-open me-1 text-danger"></i>
                        {{ $story->chapters_count }}
                    </span>
                    <span class="text-muted">
                        <i class="fas fa-clock me-1 text-warning"></i>
                        {{ $story->chapters->first()->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="story-badges">
                    @if ($story->chapters->first()->created_at->diffInHours() < 24)
                        <span class="badge-new">New</span>
                    @endif
                    @if ($story->hot_score > 1000)
                        <span class="badge-hot">Hot</span>
                    @endif
                    @if ($story->completed === 0)
                        <span class="badge-full">Full</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach