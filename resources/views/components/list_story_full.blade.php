<div class="finished-stories mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="finished-title">Truyện Đã Hoàn Thành</h2>
    </div>

    <div class="row g-4">
        @for ($i = 1; $i <= 18; $i++)
            <div class="col-6 col-md-4 col-lg-2 finished-item">
                <div class="finished-card">
                    <div class="finished-thumbnail">
                        <div class="finished-badge">FULL</div>
                        <a href="#">
                            <img src="https://fastly.picsum.photos/id/232/300/400.jpg?hmac=DXOdMe8Pi_wLFGqNGzuwLhEOl4xYSG-XoRGf13mr29w" alt="Story cover" class="img-fluid">
                        </a>
                    </div>
                    <div class="finished-info">
                        <h3 class="finished-name">
                            <a class="fw-bold" href="#">Tên Truyện Hoàn Thành {{ $i }}</a>
                        </h3>
                        <div class="finished-chapters">
                            <i class="fas fa-book-open"></i>
                            <span class="fw-bold">150 Chương</span>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

@once
@push('styles')
<style>
    .finished-stories {
        padding: 20px 0;
    }

    .finished-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3436;
        position: relative;
        padding-left: 1rem;
    }

    .finished-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 24px;
        background: linear-gradient(to bottom, #4350ff, #7296fa);
        border-radius: 2px;
    }

    .finished-item {
        opacity: 0;
        animation: fadeUp 0.5s ease forwards;
    }

    .finished-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .finished-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .finished-thumbnail {
        position: relative;
        padding-top: 133%;
        overflow: hidden;
    }

    .finished-thumbnail img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .finished-card:hover .finished-thumbnail img {
        transform: scale(1.05);
    }

    .finished-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: linear-gradient(to bottom, #4350ff, #7296fa);
        color: white;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(73, 100, 253, 0.3);
    }

    .finished-info {
        padding: 12px;
        text-align: center;
    }

    .finished-name {
        font-size: 0.9rem;
        margin: 0 0 8px 0;
        line-height: 1.4;
        height: 2.8em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .finished-name a {
        color: #2d3436;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .finished-name a:hover {
        color: #4350ff;
    }

    .finished-chapters {
        color: #636e72;
        font-size: 0.85rem;
    }

    .finished-chapters i {
        color: #4350ff;
        margin-right: 4px;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .finished-title {
            font-size: 1.25rem;
        }
        .col-md-4 {
            width: 33.333333%;
        }
    }

    @media (max-width: 767.98px) {
        .col-6 {
            width: 50%;
        }
        .finished-name {
            font-size: 0.85rem;
        }
        .finished-badge {
            font-size: 0.7rem;
            padding: 3px 10px;
        }
    }
</style>
@endpush
@endonce