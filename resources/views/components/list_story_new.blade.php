<div class="mt-4">
    <div class="row">

        <!-- Main Content - New Stories (col-8) -->
        <div class="col-12 col-sm-7 col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="section-title">Truyện mới cập nhât</h1>
                        <div class="category-filter">
                            <select class="form-select">
                                <option selected>Tất cả thể loại</option>
                                <option>Tiên Hiệp</option>
                                <option>Kiếm Hiệp</option>
                                <option>Ngôn Tình</option>
                                <option>Đô Thị</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-stories">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="story-item p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="https://fastly.picsum.photos/id/772/60/80.jpg?hmac=3HEZ-qeOvZMN79r1rQQ0JWVEeU5MMGWvUsRSuQjpgWM"
                                            class="story-thumb" alt="Story thumbnail">
                                        <div class="ms-3">
                                            <h3 class="story-title">
                                                <a href="#">Tên Truyện {{ $i }}</a>
                                            </h3>

                                            <div class="">
                                                <span class="category-tag">Tiên Hiệp</span>
                                                <span class="category-tag">Kiếm Hiệp</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="story-meta mb-1">
                                            <span class="text-muted me-3">
                                                <i class="fas fa-book-open me-1"></i> Chương 123
                                            </span>
                                            <span class="text-muted">
                                                <i class="fas fa-clock me-1"></i> 5 phút trước
                                            </span>
                                        </div>
                                        <div class="story-badges">
                                            <span class="badge-new">New</span>
                                            <span class="badge-hot">Hot</span>
                                            <span class="badge-full">Full</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar (col-4) -->
        <div class="col-12 col-sm-5 col-md-4">
            <!-- Recently Read Stories -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h3 class="section-title mb-0">Đọc Gần Đây</h3>
                </div>
                <div class="card-body p-0">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="recent-story-item p-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <img src="https://fastly.picsum.photos/id/23/50/65.jpg?hmac=sLiac5NB10ApMmTEyc4URtYMViHqnsEVQq2-GmDX52E"
                                    class="recent-story-thumb" alt="Story thumbnail">
                                <div class="recent-story-info ms-3">
                                    <h4 class="recent-story-title mb-1">
                                        <a href="#">Truyện Đã Đọc {{ $i }}</a>
                                    </h4>
                                    <div class="text-muted small">Đọc đến: Chương 45</div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Categories -->
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="section-title mb-0">Thể Loại</h3>
                </div>
                <div class="card-body">
                    <div class="category-grid">
                        @foreach (['Tiên Hiệp', 'Kiếm Hiệp', 'Ngôn Tình', 'Đô Thị', 'Huyền Huyễn', 'Xuyên Không', 'Trọng Sinh', 'Dị Giới'] as $category)
                            <a href="#" class="category-item">{{ $category }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@once
    @push('styles')
        // Add this CSS to your styles
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
                font-size: 1.1rem;
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
@endonce
