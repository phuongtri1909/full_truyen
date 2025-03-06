@extends('layouts.app')

@section('title', "Chương {$chapter->number}: {$chapter->title}")
@section('description', Str::limit(strip_tags($chapter->content), 160))
@section('keyword', "chương {$chapter->number}, {$chapter->title}")

@section('content')
    <section id="chapter" class="mt-80 mb-5">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-12">

                    <div class="my-2">
                        <div class="card-search py-2">
                            <div class="search-wrapper position-relative">
                                <h5 class="text-center fw-bold">Tìm kiếm</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search-chapter"
                                        placeholder="Chương, Tên chương, Nội dung ...">
                                    <button class="btn btn-primary" type="button" id="btn-search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <div id="search-results" class="position-absolute w-100 mt-1 d-none">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center py-2">
                                            <span>Kết quả tìm kiếm</span>
                                            <button type="button" class="btn-close" id="close-search"></button>
                                        </div>
                                        <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                                            <div class="list-group list-group-flush" id="results-list"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chapter Navigation Top -->
                    <div class="chapter-nav d-flex justify-content-between align-items-center mb-4">
                        @if ($prevChapter)
                            <a href="{{ route('chapter', $prevChapter->slug) }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @else
                            <button disabled class="btn btn-outline-secondary px-4">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @endif

                        <h1 class="chapter-title h4 mb-0 text-center mb-3">
                            Chương {{ $chapter->number }}: {{ $chapter->title }}
                        </h1>

                        @if ($nextChapter)
                            <a href="{{ route('chapter', $nextChapter->slug) }}" class="btn btn-success text-white px-4">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button disabled class="btn btn-outline-secondary px-4">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>


                    <span class="fs-8"><i class="fa-regular fa-file-word"></i> Tiểu thuyết gốc: {{ $chapter->word_count }}
                        Chữ <span class="ms-2"><i class="fa-regular fa-clock"></i>
                            {{ $chapter->created_at }}</span></span>
                    <!-- Reading Controls -->
                    <div class="reading-controls bg-light p-3 mb-4 rounded">


                        <div class="d-flex justify-content-center gap-3">
                            <div class="font-size-control">
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeFontSize(-1)">A-</button>
                                <button class="btn btn-sm btn-outline-secondary" onclick="changeFontSize(1)">A+</button>
                            </div>
                            <div class="theme-control">
                                <button class="btn btn-sm btn-outline-secondary" data-theme="light">☀️</button>
                                <button class="btn btn-sm btn-outline-secondary" data-theme="sepia">📜</button>
                                <button class="btn btn-sm btn-outline-secondary" data-theme="dark">🌙</button>
                            </div>
                        </div>

                    </div>

                    <!-- Chapter Content -->
                    <div id="chapter-content" class="chapter-content mb-4">
                        {!! nl2br(e($chapter->content)) !!}
                    </div>

                    <!-- Chapter Navigation Bottom -->
                    <div class="chapter-nav d-flex justify-content-between align-items-center mb-4">
                        @if ($prevChapter)
                            <a href="{{ route('chapter', $prevChapter->slug) }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @else
                            <button disabled class="btn btn-outline-secondary px-4">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @endif

                        @if ($nextChapter)
                            <a href="{{ route('chapter', $nextChapter->slug) }}" class="btn btn-success text-white px-4">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button disabled class="btn btn-outline-secondary px-4">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #chapter {
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .chapter-content {

            padding: 20px;
            font-size: 18px;
            line-height: 1.8;
            text-align: justify;
            border-radius: 8px;
            scroll-behavior: smooth;
            /* Smooth scrolling */
        }

        /* Customize scrollbar */
        .chapter-content::-webkit-scrollbar {
            width: 8px;
        }

        .chapter-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .chapter-content::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .chapter-content::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Themes */
        .theme-light {
            background-color: #fff;
            color: #333;
        }

        .theme-sepia {
            background-color: #f4ecd8;
            color: #5b4636;
        }

        .theme-dark {
            background-color: #2d2d2d;
            color: #ccc;
        }

        /* search  */
        #search-results {
            z-index: 1000;
        }

        #search-results .card {
            border: 1px solid rgba(0, 0, 0, .125);
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }

        #search-results .list-group-item {
            padding: 0.5rem 1rem;
            border-left: 0;
            border-right: 0;
        }

        #search-results .list-group-item:first-child {
            border-top: 0;
        }

        #search-results .list-group-item:hover {
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            #search-results {
                position: fixed !important;
                top: 60px;
                left: 0;
                right: 0;
                margin: 0 15px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        const content = document.getElementById('chapter-content');
        const chapterSection = document.getElementById('chapter');
        let fontSize = localStorage.getItem('fontSize') || 18;
        let theme = localStorage.getItem('theme') || 'light';

        // Font size controls
        function changeFontSize(delta) {
            fontSize = Math.max(14, Math.min(24, parseInt(fontSize) + delta));
            content.style.fontSize = `${fontSize}px`;
            localStorage.setItem('fontSize', fontSize);
        }

        // Theme controls
        document.querySelectorAll('[data-theme]').forEach(button => {
            button.addEventListener('click', () => {
                theme = button.dataset.theme;
                applyTheme(theme);
                localStorage.setItem('theme', theme);
            });
        });

        function applyTheme(theme) {
            // Remove existing theme classes
            content.classList.remove('theme-light', 'theme-sepia', 'theme-dark');
            document.body.classList.remove('theme-light', 'theme-sepia', 'theme-dark');
            chapterSection.classList.remove('theme-light', 'theme-sepia', 'theme-dark');

            // Add new theme class
            content.classList.add(`theme-${theme}`);
            document.body.classList.add(`theme-${theme}`);
            chapterSection.classList.add(`theme-${theme}`);
        }

        // Initialize settings
        window.addEventListener('DOMContentLoaded', () => {
            content.style.fontSize = `${fontSize}px`;
            applyTheme(theme);
        });
    </script>

    <script>
        let searchTimeout;

        $('#search-chapter').on('input', function() {
            clearTimeout(searchTimeout);
            const searchTerm = $(this).val().trim();

            if (searchTerm.length < 2) {
                $('#search-results').addClass('d-none');
                return;
            }

            searchTimeout = setTimeout(() => {
                $.ajax({
                    url: '{{ route('chapters.search') }}',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('#results-list').html(response.html);
                        $('#search-results').removeClass('d-none');
                    }
                });
            }, 300);
        });

        $('#close-search').click(function() {
            $('#search-results').addClass('d-none');
            $('#search-chapter').val('');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-wrapper').length) {
                $('#search-results').addClass('d-none');
            }
        });
    </script>
@endpush
