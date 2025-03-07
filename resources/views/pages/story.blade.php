@extends('layouts.app')
@section('title', 'Trang chủ')
@section('description','')
@section('keyword','')

    @push('styles')
        <style>
            .card-search {
                background: #e7e7e7;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
                text-align: center;
                transition: transform 0.3s ease;
            }

            .search-wrapper {
                max-width: min(500px, 90%);
                margin: 0 auto;
            }

            .search-wrapper .form-control {
                height: 50px;
                border-radius: 25px 0 0 25px;
                border: none;
                padding-left: 20px;
            }

            .search-wrapper .btn {
                border-radius: 0 25px 25px 0;
                padding: 0 25px;
            }

            @media (max-width: 768px) {
                .search-wrapper .form-control {
                    height: 40px;
                }

                .search-wrapper .btn {
                    padding: 0 15px;
                }
            }

            .banner-image-home {
                width: 100%;
                height: 350px;
                object-position: center;
            }

            @media (max-width: 768px) {
                .banner-image-home {
                    height: 250px;
                }
            }

            @media (max-width: 576px) {
                .banner-image-home {
                    height: 200px;
                }
            }
        </style>
    @endpush

@section('content')
    <div class=""></div>
    {{-- @include('components.banner-video') --}}
    {{-- @include('components.info_book') --}}
    <img class="w-100 banner-image-home" src="{{ asset('assets/images/banner_conduongbachu.webp') }}" alt="">
    @include('components.info_book_home')

    @include('components.info_book')


    @if (!Auth()->check() || (Auth()->check() && Auth()->user()->ban_read == false))
        <div class="container mt-2">
            <div class="card-search py-2">
                <div class="search-wrapper">
                    <h5 class="text-center fw-bold">Tìm kiếm </h5>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search-chapter" placeholder="Chương, Tên chương, Nội dung ...">
                        <button class="btn btn-primary" type="button" id="btn-search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @include('components.all_chapter', ['chapters' => $chapters])
    @else
        <div class="text-center py-5">
            <i class="fas fa-sad-tear fa-4x text-muted mb-3 animate__animated animate__shakeX"></i>
            <h5 class="text-danger">Bạn đã bị cấm đọc truyện!</h5>
        </div>
    @endif

    @if (!Auth()->check() || (Auth()->check() && Auth()->user()->ban_comment == false))
        @include('components.comment', ['pinnedComments' => $pinnedComments, 'regularComments' => $regularComments])
    @else
        <div class="text-center py-5">
            <i class="fas fa-sad-tear fa-4x text-muted mb-3 animate__animated animate__shakeX"></i>
            <h5 class="text-danger">Bạn đã bị cấm bình luận!</h5>
        </div>
    @endif

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let searchTimeout;
            const searchInput = $('#search-chapter');
            const btnSearch = $('#btn-search');
            const chaptersContainer = $('#chapters-container');
            const loadMoreBtn = $('#load-more');

            function performSearch() {
                const searchTerm = searchInput.val();
                btnSearch.html('<i class="fas fa-spinner fa-spin"></i>');

                $.ajax({
                    url: '{{ route('home') }}',
                    data: {
                        search: searchTerm,
                        page: 1
                    },
                    success: function(response) {
                        chaptersContainer.html(response.html);

                        if (response.hasMore) {
                            loadMoreBtn.data('page', 1).show()
                                .html(`Xem thêm 1/${response.lastPage}`);
                        } else {
                            loadMoreBtn.hide();
                        }
                    },
                    error: function() {
                        showToast('Có lỗi xảy ra khi tìm kiếm', 'error');
                    },
                    complete: function() {
                        btnSearch.html('<i class="fas fa-search"></i>');
                    }
                });
            }

            searchInput.on('keyup', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 500);
            });

            btnSearch.on('click', performSearch);
        });
    </script>
@endpush
