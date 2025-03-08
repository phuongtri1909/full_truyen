<section class="new-stories-section mt-4">
    <div class="row">
        <!-- Main Content - New Stories -->
        <div class="col-12 col-sm-7 col-md-8">
            <div class="content-wrapper">
                <div class="section-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="section-title">
                            <i class="fas fa-clock text-primary me-2 fa-xl cl-00b894"></i>Truyện mới cập nhật
                        </h1>
                        <div class="category-filter">
                            <select class="form-select custom-select" id="newStoryCategoryFilter">
                                <option value="">Tất cả thể loại</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="stories-container">
                    <div class="list-stories">
                        @include('components.story-list-items', ['newStories' => $newStories])
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-12 col-sm-5 col-md-4">
            <!-- Recently Read Stories -->
            <div class="sidebar-widget recent-reads">
                <div class="widget-header">
                    <h3 class="widget-title">
                        <i class="fas fa-history text-primary me-2 fa-xl text-info"></i>Đọc Gần Đây
                    </h3>
                </div>
                <div class="widget-content">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="recent-story-item">
                            <div class="d-flex align-items-center">
                                <div class="story-thumb-wrapper">
                                    <img src="https://fastly.picsum.photos/id/23/50/65.jpg" 
                                         class="recent-story-thumb" alt="Story thumbnail">
                                </div>
                                <div class="story-info">
                                    <h4 class="recent-story-title">
                                        <a href="#">Truyện Đã Đọc {{ $i }}</a>
                                    </h4>
                                    <div class="reading-progress">
                                        <div class="progress-label">Đọc đến: Chương 45</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 45%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="sidebar-widget categories-widget">
                <div class="widget-header">
                    <h3 class="widget-title">
                        <i class="fas fa-tags text-primary me-2"></i>Thể Loại
                    </h3>
                </div>
                <div class="widget-content">
                    <div class="category-grid">
                        @foreach ($categories as $category)
                            <a href="{{ route('categories.show', $category) }}" 
                               class="category-item" 
                               data-stories="{{ $category->stories_count }}">
                                <span class="category-name">{{ $category->name }}</span>
                                <span class="story-count">{{ $category->stories_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@once
    @push('styles')
        <style>
            .story-badges {
                display: flex;
                gap: 8px;
                margin-top: 8px;
            }

            .badge-new,
            .badge-hot,
            .badge-full {
                display: inline-block;
                padding: 2px 8px;
                border-radius: 4px;
                font-size: 0.75rem;
                font-weight: 600;
                text-transform: uppercase;
            }

            .badge-new {
                background: linear-gradient(135deg, #00b894, #00cec9);
                color: white;
            }

            .badge-hot {
                background: linear-gradient(135deg, #ff7675, #d63031);
                color: white;
            }

            .badge-full {
                background: linear-gradient(135deg, #6c5ce7, #a29bfe);
                color: white;
            }

            /* Main Content Styles */
            .section-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: #333;
            }

            .story-thumb {
                width: 60px;
                height: 80px;
                object-fit: cover;
                border-radius: 4px;
            }

            .story-title {
                font-size: 0.9rem;
                margin: 0;
            }

            .story-title a {
                color: #333;
                text-decoration: none;
                transition: color 0.3s;
            }

            .story-title a:hover {
                color: #007bff;
            }

            .category-tag {
                display: inline-block;
                padding: 2px 8px;
                margin-right: 4px;
                background: #f0f2f5;
                color: #666;
                border-radius: 12px;
                font-size: 0.75rem;
            }

            /* Sidebar Styles */
            .recent-story-thumb {
                width: 50px;
                height: 65px;
                object-fit: cover;
                border-radius: 4px;
            }

            .recent-story-title {
                font-size: 0.95rem;
                margin: 0;
                line-height: 1.4;
            }

            .recent-story-title a {
                color: #333;
                text-decoration: none;
                transition: color 0.3s;
            }

            .recent-story-title a:hover {
                color: #007bff;
            }

            .category-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .category-item {
                display: block;
                padding: 8px;
                background: #f8f9fa;
                color: #333;
                text-decoration: none;
                border-radius: 4px;
                text-align: center;
                transition: all 0.3s;
            }

            .category-item:hover {
                background: #007bff;
                color: white;
                transform: translateY(-2px);
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .story-title {
                    font-size: 1rem;
                }

                .story-meta {
                    font-size: 0.85rem;
                }

                .category-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            
        </style>
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#newStoryCategoryFilter').change(function() {
                    const categoryId = $(this).val();
                    const storiesContainer = $('.list-stories');
                    
                    storiesContainer.addClass('loading');
                    
                    $.ajax({
                        url: '{{ route("home") }}',
                        method: 'GET',
                        data: {
                            category_id: categoryId,
                            type: 'new'
                        },
                        success: function(response) {
                            storiesContainer.html(response.html);
                        },
                        error: function() {
                            alert('Có lỗi xảy ra khi lọc truyện');
                        },
                        complete: function() {
                            storiesContainer.removeClass('loading');
                        }
                    });
                });
            });
        </script>
    @endpush
@endonce
