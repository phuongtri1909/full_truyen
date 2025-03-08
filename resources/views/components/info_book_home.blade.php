<section id="info-book-home">
    <div class="container mt-3">
        <div class="info-card-home h-100 rounded-4">
            <div class="p-2 row">
                <div class="col-12 col-md-2 d-flex justify-content-center flex-column mb-3 mb-md-0 ">
                    <div class="rounded-4 shadow">
                        <img src="{{ Storage::url($story->cover) }}" alt="{{ $story->title }}" class="img-fluid img-book">
                    </div>
                    <div class="story-categories mb-3">
                        <p class="mb-2 text-start">Thể loại:</p>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($storyCategories as $category)
                                <a href="{{ route('categories.show', $category['slug']) }}" class="category-tag">
                                    {{ $category['name'] }}

                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="stat-item text-dark mt-2">
                        Trạng thái : @if ($status->status == 'done')
                            <span class="text-success fw-bold">Hoàn Thành</span>
                        @else
                            <span class="text-primary fw-bold">Đang viết</span>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-10 col-lg-7 ">
                    <div class="mb-3 text-start">
                        <h2 class="fw-semibold border-bottom">{{ $story->title }}</h2>
                    </div>

                    <div class="d-flex justify-content-start gap-3">
                        <div class="stat-item text-dark">
                            <i class="fas fa-book-open me-1 text-danger"></i>
                            <span class="counter" data-target="{{ $stats['total_chapters'] }}">0</span>
                            <span>Chương</span>
                        </div>
                        <div class="stat-item text-dark">
                            <i class="fas fa-eye eye text-primary"></i>
                            <span class="counter" data-target="{{ $stats['total_views'] }}">0</span>
                            <span>Lượt Xem</span>
                        </div>
                        <div class="stat-item text-dark">
                            <i class="fas fa-star star text-warning"></i>
                            <span class="counter" data-target="{{ $stats['ratings']['count'] }}">0</span>
                            <span>đánh giá</span>
                        </div>

                    </div>
                    <div>
                        <p class="text-muted
                            mt-4 mb-0 text-justify">{{ $story->description }}</p>
                    </div>

                </div>

                <div class="col-12 col-lg-3 mt-3 mt-lg-0">
                    <div class="info-card bg-white p-3 shadow">
                        <h6 class="info-title text-dark">ĐÁNH GIÁ</h6>
                        <div class="rating">
                            @php
                                $rating = auth()->check() ? auth()->user()->rating ?? 0 : 0;
                                $fullStars = floor($rating);
                                $hasHalfStar = $rating - $fullStars >= 0.5;
                            @endphp

                            <div class="stars" id="rating-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $fullStars ? 'full' : 'empty' }}"
                                        data-rating="{{ $i }}"></i>
                                @endfor
                            </div>

                            <hr class="my-1">

                            <div class="mt-1"><span class="rating-number">Tổng: </span>
                                {{ number_format($stats['ratings']['average'], 1) }}/5</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@push('styles')
    <style>
        .story-categories {
            margin: 1rem 0;
        }

        .category-tag {
            display: inline-block;
            padding: 0.2rem 0.2rem;
            background: rgba(67, 80, 255, 0.1);
            color: #e26dfa;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .category-tag:hover {
            background: #f5a3ff;
            color: white;
            transform: translateY(-2px);
        }

        .category-count {
            font-size: 0.75rem;
            opacity: 0.8;
            margin-left: 4px;
        }

        .category-tag:hover .category-count {
            opacity: 1;
        }

        /*  */
        .info-card-home {
            background: #e1eef9;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .text-justify {
            text-align: justify;
            text-justify: inter-word;
            word-break: normal;
            line-height: 1.8;
            margin-bottom: 1rem;
            hyphens: auto;
        }

        .img-book {
            transition: transform 0.3s ease;
            width: 100%;
            height: 300px;
            object-fit: cover;

        }

        .img-book:hover {
            transform: scale(1.2);
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .rounded-4 {
                max-width: 200px;
                /* Smaller width for tablets */
            }
        }

        @media (max-width: 576px) {
            .rounded-4 {
                max-width: 150px;
                /* Even smaller for mobile */
            }
        }

        .shadow {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }
    </style>
@endpush
