<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title','Trang chủ - Con Đường Bá Chủ')</title>
    <meta name="description" content="@yield('description', 'Là thủ khoa với điểm thi đại học cao nhất toàn quốc, lại trở thành một phế vật ở thế giới tu chân tàn khốc, nơi sức mạnh chính là luật lệ, cá lớn nuốt cá bé, kẻ yếu chỉ như con kiến không có tiếng nói, bị người người giẫm đạp.
    Hai mắt mù loà, thân phận hèn kém, vạn địch vây quanh...thiếu niên trong tuyệt cảnh thức tỉnh Bá Chủ Hệ Thống, từ đó đặt chân vào lằn ranh sinh tử trên con đường tu chân rực rỡ sắc màu.
    Vạn tộc tung hoành, thiên kiêu như nấm, giai nhân làm bạn, khoái ý ân cừu, hành tẩu giang hồ, nhất thống thiên địa...viết nên một khúc truyền kỳ bất hủ. Con Đường Bá Chủ là truyện Huyền Huyễn, Tiên Hiệp... ')">
    <meta name="keywords" content="@yield('keywords', 'con duong ba chu,conduongbachu,Con Đường Bá Chủ, truyện tranh online, đọc truyện tranh, đọc truyện online, CDBC')">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title','Trang chủ - Con Đường Bá Chủ')">
    <meta property="og:description" content="@yield('decription','Là thủ khoa với điểm thi đại học cao nhất toàn quốc, lại trở thành một phế vật ở thế giới tu chân tàn khốc, nơi sức mạnh chính là luật lệ, cá lớn nuốt cá bé, kẻ yếu chỉ như con kiến không có tiếng nói, bị người người giẫm đạp.
    Hai mắt mù loà, thân phận hèn kém, vạn địch vây quanh...thiếu niên trong tuyệt cảnh thức tỉnh Bá Chủ Hệ Thống, từ đó đặt chân vào lằn ranh sinh tử trên con đường tu chân rực rỡ sắc màu.
    Vạn tộc tung hoành, thiên kiêu như nấm, giai nhân làm bạn, khoái ý ân cừu, hành tẩu giang hồ, nhất thống thiên địa...viết nên một khúc truyền kỳ bất hủ. Con Đường Bá Chủ là truyện Huyền Huyễn, Tiên Hiệp... ')">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:site_name" content="Con Đường Bá Chủ">
    <meta property="og:image" content="{{ asset('assets/images/logo/logo_conduongbachu.webp') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/images/logo/logo_conduongbachu.webp') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="@yield('title','Trang chủ - Con Đường Bá Chủ')">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title','Trang chủ - Con Đường Bá Chủ')">
    <meta name="twitter:description" content="@yield('decription','Là thủ khoa với điểm thi đại học cao nhất toàn quốc, lại trở thành một phế vật ở thế giới tu chân tàn khốc, nơi sức mạnh chính là luật lệ, cá lớn nuốt cá bé, kẻ yếu chỉ như con kiến không có tiếng nói, bị người người giẫm đạp.
    Hai mắt mù loà, thân phận hèn kém, vạn địch vây quanh...thiếu niên trong tuyệt cảnh thức tỉnh Bá Chủ Hệ Thống, từ đó đặt chân vào lằn ranh sinh tử trên con đường tu chân rực rỡ sắc màu.
    Vạn tộc tung hoành, thiên kiêu như nấm, giai nhân làm bạn, khoái ý ân cừu, hành tẩu giang hồ, nhất thống thiên địa...viết nên một khúc truyền kỳ bất hủ. Con Đường Bá Chủ là truyện Huyền Huyễn, Tiên Hiệp... ')">
    <meta name="twitter:image" content="{{ asset('assets/images/logo/logo_conduongbachu.webp') }}">
    <meta name="twitter:image:alt" content="@yield('title','Trang chủ - Con Đường Bá Chủ')">
    <link rel="icon" href="{{asset('assets/images/logo/favicon.ico')}}" type="image/png/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.ico') }}" type="image/x-icon">
    <meta name="google-site-verification" content="1KqxZNHaDT4KmKEz-TSyKK3GSE3zI47khTAwE5fR5AQ" />

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('assets/images/logo/logo_conduongbachu.webp')}}"
        }
    </script>

    @stack('meta')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->

    {{-- styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @stack('styles')

    {{-- end styles --}}
</head>

<body>
    <header class="container">
        <nav
            class="navbar navbar-expand-lg fixed-top transition-header {{ !request()->routeIs('home') ? 'chapter-header' : '' }}">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <!-- Logo -->
                    <a class="navbar-brand p-0" href="{{ route('home') }}">
                        <img height="50" src="{{ asset('assets/images/logo/logo_conduongbachu.webp') }}"
                            alt="logo">
                    </a>

                    <div class="d-flex align-items-center">
                        <!-- Desktop Menu - Visible on lg screens and up -->
                        <div class="list-menu d-none d-lg-block">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                                <li class="nav-item">
                                    <a href="javascript:void(0)" onclick="scrollToAllChapters(event)"
                                        class="text-dark nav-link">
                                        CHƯƠNG TRUYỆN
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="text-dark nav-link" href="javascript:void(0)"
                                        onclick="scrollToComments(event)">
                                        BÌNH LUẬN
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="text-dark  nav-link" href="javascript:void(0)"
                                        onclick="scrollToDonate(event)">
                                        DONATE
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="text-dark nav-link" href="{{ route('login') }}">

                            @auth
                                <div class="dropdown">
                                    <a href="#"
                                        class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark"
                                        data-bs-toggle="dropdown">
                                        <img src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('assets/images/avatar_default.jpg') }}"
                                            class="rounded-circle" width="40" height="40" alt="avatar"
                                            style="object-fit: cover;">
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end animate slideIn">
                                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'mod')
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                    <i class="fas fa-tachometer-alt me-2"></i>Quản trị
                                                </a>
                                            </li>
                                        @endif

                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile') }}">
                                                <i class="fas fa-user me-2"></i>Trang cá nhân
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn">ĐĂNG NHẬP</a>
                            @endauth
                        </a>

                        <!-- Mobile Menu Toggle Button - Visible on screens smaller than lg -->
                        <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </button>
                    </div>


                </div>
            </div>
        </nav>

        <!-- Mobile Menu - Offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
            <div class="offcanvas-header">

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img height="50" src="{{ asset('assets/images/logo/logo_conduongbachu.webp') }}" alt="logo">
                </a>

                {{-- <a href="{{ route('home') }}" class="text-decoration-none text-dark fw-bold">
                    <fa class="fa-solid fa-home fa-xl"></fa> TRANG CHỦ
                </a> --}}
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">

                <!-- Navigation Links -->
                <div class="mobile-section">
                    <div class="mobile-nav-links d-flex flex-column">


                        <a href="javascript:void(0)" onclick="scrollToAllChapters(event)"class="mobile-menu-item"
                            data-bs-dismiss="offcanvas">
                            <span class="fw-bold">CHƯƠNG TRUYỆN</span>
                        </a>

                        <hr class="divider my-3">

                        <a href="javascript:void(0)" onclick="scrollToComments(event)" class="mobile-menu-item"
                            data-bs-dismiss="offcanvas">
                            <span class="fw-bold">BÌNH LUẬN</span>
                        </a>

                        <hr class="divider my-3">

                        <a href="javascript:void(0)" onclick="scrollToDonate(event)" class="mobile-menu-item"
                            data-bs-dismiss="offcanvas">
                            <span class="fw-bold">DONATE</span>
                        </a>

                    </div>
                </div>

                <!-- Auth Section -->


            </div>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.transition-header');
            const scrollThreshold = 50;
            const isHome = window.location.pathname === '/';

            function updateHeader() {
                if (isHome) {
                    const headerHeight = header.offsetHeight;
                    if (window.scrollY > headerHeight) {
                        header.classList.add('scrolled');
                        header.style.display = 'block';
                    } else {
                        header.classList.remove('scrolled');
                        header.style.display = 'none';
                    }
                } else {
                    if (window.scrollY > scrollThreshold) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                }
            }

            updateHeader();
            window.addEventListener('scroll', updateHeader);
        });
    </script>

    <script>
        function scrollToComments(event) {
            event.preventDefault();
            const isHome = window.location.pathname === '{{ route('home') }}';

            if (isHome) {
                // If on home page, smooth scroll to comments
                const commentsSection = document.getElementById('comments');
                const headerHeight = document.querySelector('.transition-header').offsetHeight;
                const targetPosition = commentsSection.offsetTop - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            } else {
                // If on different page, redirect to home with hash
                window.location.href = '{{ route('home') }}#comments';
            }
        }

        // Handle hash in URL when page loads
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#comments') {
                setTimeout(() => {
                    const commentsSection = document.getElementById('comments');
                    const headerHeight = document.querySelector('.transition-header').offsetHeight;
                    const targetPosition = commentsSection.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        });
    </script>

    {{-- scrollDonate --}}
    <script>
        function scrollToDonate(event) {
            event.preventDefault();
            const donateSection = document.getElementById('donate');

            if (donateSection) {
                const headerHeight = document.querySelector('.transition-header')?.offsetHeight || 0;
                const targetPosition = donateSection.offsetTop - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }
    </script>

    <!-- Add scroll function -->
    <script>
        function scrollToAllChapters(event) {
            event.preventDefault();
            const isHome = window.location.pathname === '/';

            if (isHome) {
                const allChaptersSection = document.getElementById('all-chapter');
                if (allChaptersSection) {
                    const headerHeight = document.querySelector('.transition-header')?.offsetHeight || 0;
                    const targetPosition = allChaptersSection.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            } else {
                window.location.href = '{{ route('home') }}#all-chapter';
            }
        }

        // Handle hash in URL
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#all-chapter') {
                setTimeout(() => {
                    const allChaptersSection = document.getElementById('all-chapter');
                    if (allChaptersSection) {
                        const headerHeight = document.querySelector('.transition-header')?.offsetHeight ||
                            0;
                        const targetPosition = allChaptersSection.offsetTop - headerHeight - 20;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }, 300);
            }
        });
    </script>
