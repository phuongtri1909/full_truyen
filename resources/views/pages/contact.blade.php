@extends('layouts.app')

@section('title', 'Liên Hệ & Giới Thiệu')

@section('description', 'Thông tin về đội ngũ tác giả, dịch giả và cách thức liên hệ với chúng tôi.')

@section('content')
<div class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="contact-title animated-element" data-animation="fadeInDown">
                        <span class="text-primary">Đội Ngũ</span> <span class="title-highlight">Sáng Tạo</span>
                    </h1>
                    <p class="lead contact-subtitle animated-element" data-animation="fadeIn" data-delay="200">
                        Gặp gỡ những người đem đến cho bạn những câu chuyện tuyệt vời
                    </p>
                    <div class="contact-divider animated-element" data-animation="scaleX"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 animated-element" data-animation="fadeInLeft">
                    <img src="https://placehold.co/600x400" alt="Về chúng tôi" class="img-fluid rounded-4 shadow-lg">
                </div>
                <div class="col-lg-6 animated-element" data-animation="fadeInRight">
                    <h2 class="section-title mb-4">Về Chúng Tôi</h2>
                    <p class="text-muted">
                        Được thành lập từ năm 2020, cộng đồng chúng tôi là nơi quy tụ những người đam mê văn học, 
                        đặc biệt là tiểu thuyết và truyện ngắn trên nhiều lĩnh vực từ giả tưởng, kỳ ảo đến lãng mạn, 
                        trinh thám.
                    </p>
                    <p class="text-muted">
                        Chúng tôi tin rằng mỗi câu chuyện đều có sức mạnh để thay đổi cách nhìn và làm phong phú thêm 
                        trải nghiệm sống của độc giả. Vì vậy, chúng tôi cam kết mang đến những tác phẩm chất lượng, 
                        được tuyển chọn kỹ lưỡng và biên tập chuyên nghiệp.
                    </p>
                    <div class="stats-container d-flex mt-4">
                        <div class="stat-item text-center me-4">
                            <div class="stat-number counter" data-target="50">0</div>
                            <div class="stat-label">Tác giả</div>
                        </div>
                        <div class="stat-item text-center me-4">
                            <div class="stat-number counter" data-target="1000">0</div>
                            <div class="stat-label">Truyện</div>
                        </div>
                        <div class="stat-item text-center">
                            <div class="stat-number counter" data-target="500000">0</div>
                            <div class="stat-label">Độc giả</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-12">
                    <h2 class="section-title animated-element" data-animation="fadeInUp">Đội Ngũ Nổi Bật</h2>
                    <p class="lead text-muted animated-element" data-animation="fadeInUp" data-delay="200">
                        Gặp gỡ những người tài năng đằng sau những tác phẩm bạn yêu thích
                    </p>
                </div>
            </div>

            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card animated-element" data-animation="fadeInUp" data-delay="300">
                        <div class="team-img-container">
                            <img src="https://placehold.co/400x500" alt="Nguyễn Văn A" class="img-fluid team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Nguyễn Văn A</h3>
                            <p class="team-role">Tác giả chính</p>
                            <p class="team-desc">Tác giả của hơn 10 bộ truyện nổi tiếng với phong cách viết sắc bén và lối kể chuyện cuốn hút.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card animated-element" data-animation="fadeInUp" data-delay="400">
                        <div class="team-img-container">
                            <img src="https://placehold.co/400x500" alt="Trần Thị B" class="img-fluid team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Trần Thị B</h3>
                            <p class="team-role">Dịch giả chính</p>
                            <p class="team-desc">Với kinh nghiệm 8 năm trong lĩnh vực dịch thuật văn học, chuyên về tiểu thuyết ngôn tình và kỳ ảo.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card animated-element" data-animation="fadeInUp" data-delay="500">
                        <div class="team-img-container">
                            <img src="https://placehold.co/400x500" alt="Lê Văn C" class="img-fluid team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Lê Văn C</h3>
                            <p class="team-role">Biên tập viên</p>
                            <p class="team-desc">Người chịu trách nhiệm chính cho việc kiểm duyệt và nâng cao chất lượng tất cả các tác phẩm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title animated-element" data-animation="fadeInUp">Liên Hệ Với Chúng Tôi</h2>
                    <p class="lead text-muted animated-element" data-animation="fadeInUp" data-delay="200">
                        Bạn có câu hỏi hoặc muốn hợp tác cùng chúng tôi? Hãy để lại lời nhắn!
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="contact-info-card animated-element" data-animation="fadeInLeft">
                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Địa Chỉ</h3>
                                <p>123 Đường Nguyễn Văn Linh, Quận 7, TP.HCM</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Email</h3>
                                <p>lienhe@truyen.com</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Điện Thoại</h3>
                                <p>+84 123 456 789</p>
                            </div>
                        </div>

                        <div class="contact-social mt-4">
                            <h3>Kết Nối</h3>
                            <div class="social-icons">
                                <a href="#" class="social-icon-lg"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon-lg"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon-lg"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon-lg"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 animated-element" data-animation="fadeInRight">
                    <div class="contact-form-card">
                        <h3 class="mb-4">Gửi Tin Nhắn</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Họ Tên">
                                        <label for="name">Họ Tên</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Chủ đề">
                                    <label for="subject">Chủ đề</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" style="height: 150px" placeholder="Nội dung"></textarea>
                                    <label for="message">Nội dung</label>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i> Gửi Tin Nhắn
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title animated-element" data-animation="fadeInUp">Câu Hỏi Thường Gặp</h2>
                    <p class="lead text-muted animated-element" data-animation="fadeInUp" data-delay="200">
                        Giải đáp những thắc mắc phổ biến về dịch vụ của chúng tôi
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 animated-element" data-animation="fadeInUp" data-delay="300">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Làm thế nào để trở thành tác giả trên trang web?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Để trở thành tác giả, bạn cần đăng ký tài khoản, xác thực email, và gửi yêu cầu qua mục "Đăng ký tác giả" trong trang cá nhân. Đội ngũ của chúng tôi sẽ xem xét hồ sơ và liên hệ lại trong vòng 3-5 ngày làm việc.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Tôi muốn đóng góp vào việc dịch thuật thì làm thế nào?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Chúng tôi luôn tìm kiếm những dịch giả tài năng. Bạn có thể gửi CV và bản dịch mẫu của mình qua email: dichgia@truyen.com. Đội ngũ biên tập sẽ đánh giá và phản hồi bạn nhanh nhất có thể.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Làm thế nào để báo cáo nội dung vi phạm bản quyền?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Chúng tôi tôn trọng quyền sở hữu trí tuệ và nỗ lực bảo vệ bản quyền. Nếu bạn phát hiện nội dung vi phạm bản quyền, vui lòng gửi email đến banquyen@truyen.com với đầy đủ thông tin về tác phẩm bị vi phạm và bằng chứng sở hữu bản quyền.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Tôi có thể đề xuất tác phẩm mới không?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Chúng tôi rất hoan nghênh đề xuất từ độc giả! Bạn có thể gửi đề xuất thông qua mẫu liên hệ trên trang web hoặc email tới dexuat@truyen.com với thông tin về tác phẩm bạn muốn đọc.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    /* Hero Section */
    .contact-hero {
        padding: 120px 0 60px;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://placehold.co/1920x1080') center/cover;
        color: white;
        text-align: center;
        position: relative;
    }
    
    .contact-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .title-highlight {
        position: relative;
        z-index: 1;
    }
    
    .title-highlight::after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: -5px;
        right: -5px;
        height: 12px;
        background-color: rgba(var(--bs-primary-rgb), 0.3);
        z-index: -1;
        transform: rotate(-1deg);
    }
    
    .contact-subtitle {
        font-size: 1.3rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }
    
    .contact-divider {
        width: 80px;
        height: 4px;
        background: var(--bs-primary);
        margin: 2rem auto;
    }
    
    /* Section Styling */
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        position: relative;
    }
    
    /* Team Section */
    .team-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }
    
    .team-img-container {
        position: relative;
        overflow: hidden;
    }
    
    .team-img {
        height: 300px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .team-card:hover .team-img {
        transform: scale(1.05);
    }
    
    .team-social {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 15px;
        padding: 15px;
        background: rgba(0,0,0,0.7);
        transition: bottom 0.3s ease;
    }
    
    .team-card:hover .team-social {
        bottom: 0;
    }
    
    .social-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 50%;
        color: var(--bs-primary);
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        background: var(--bs-primary);
        color: white;
        transform: translateY(-3px);
    }
    
    .team-info {
        padding: 20px;
    }
    
    .team-name {
        font-size: 1.3rem;
        margin-bottom: 5px;
    }
    
    .team-role {
        color: var(--bs-primary);
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .team-desc {
        color: #777;
        font-size: 0.9rem;
        line-height: 1.6;
    }
    
    /* Contact Info */
    .contact-info-card {
        background: linear-gradient(135deg, var(--bs-primary) 0%, #4e73df 100%);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        color: white;
    }
    
    .contact-info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 30px;
    }
    
    .contact-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 20px;
    }
    
    .contact-details h3 {
        font-size: 1.2rem;
        margin-bottom: 5px;
    }
    
    .contact-details p {
        opacity: 0.9;
        margin-bottom: 0;
    }
    
    .contact-social h3 {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }
    
    .social-icons {
        display: flex;
        gap: 15px;
    }
    
    .social-icon-lg {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        color: white;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .social-icon-lg:hover {
        background: white;
        color: var(--bs-primary);
        transform: translateY(-5px);
    }
    
    /* Contact Form */
    .contact-form-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }
    
    .form-floating > label {
        padding-left: 1rem;
    }
    
    .form-control {
        border-radius: 10px;
        padding: 1rem;
        border: 1px solid #e1e5ea;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.15);
    }
    
    /* Stats */
    .stats-container {
        margin-top: 30px;
    }
    
    .stat-item {
        flex: 1;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--bs-primary);
        margin-bottom: 5px;
    }
    
    .stat-label {
        color: #777;
        font-size: 0.9rem;
    }
    
    /* FAQ Section */
    .accordion-item {
        margin-bottom: 15px;
        border: none;
        border-radius: 10px !important;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .accordion-button {
        padding: 20px;
        font-weight: 600;
        background: white;
    }
    
    .accordion-button:not(.collapsed) {
        color: var(--bs-primary);
        background-color: rgba(var(--bs-primary-rgb), 0.05);
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(var(--bs-primary-rgb), 0.1);
    }
    
    .accordion-body {
        padding: 20px;
    }
    
    /* Animations */
    .animated-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }
    
    .animated-element.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes scaleX {
        from {
            transform: scaleX(0);
        }
        to {
            transform: scaleX(1);
        }
    }
    
    /* Responsive */
    @media (max-width: 991px) {
        .contact-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .contact-hero {
            padding: 80px 0 40px;
        }
    }
    
    @media (max-width: 767px) {
        .contact-title {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .contact-info-card, .contact-form-card {
            padding: 25px;
        }
        
        .stat-number {
            font-size: 1.8rem;
        }
        
        .team-img {
            height: 250px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation for elements when they come into view
        const animatedElements = document.querySelectorAll('.animated-element');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animation = element.dataset.animation;
                    const delay = element.dataset.delay || 0;
                    
                    setTimeout(() => {
                        element.classList.add('visible');
                        
                        if (animation) {
                            element.style.animation = `${animation} 0.8s ease forwards`;
                        }
                    }, delay);
                    
                    observer.unobserve(element);
                }
            });
        }, { threshold: 0.1 });
        
        animatedElements.forEach(element => {
            observer.observe(element);
        });
        
        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2000; // Animation duration in ms
                    
                    let startTime = null;
                    
                    function updateCounter(timestamp) {
                        if (!startTime) startTime = timestamp;
                        const progress = timestamp - startTime;
                        const percentage = Math.min(progress / duration, 1);
                        
                        const value = Math.floor(percentage * target);
                        counter.innerText = value.toLocaleString();
                        
                        if (percentage < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.innerText = target.toLocaleString();
                        }
                    }
                    
                    requestAnimationFrame(updateCounter);
                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
        
        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;
                const message = document.getElementById('message').value;
                
                // Form validation
                if (!name || !email || !subject || !message) {
                    showToast('Vui lòng điền đầy đủ thông tin', 'error');
                    return;
                }
                
                // Show loading state
                const submitBtn = contactForm.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang gửi...';
                
                // Simulate API call
                // In real implementation, replace this with actual AJAX call
                setTimeout(() => {
                    // Reset form
                    contactForm.reset();
                    
                    // Reset button
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                    
                    // Show success message
                    showToast('Tin nhắn của bạn đã được gửi thành công!', 'success');
                }, 1500);
                
                // For real implementation:
                /*
                fetch('/api/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ name, email, subject, message })
                })
                .then(response => response.json())
                .then(data => {
                    contactForm.reset();
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                    showToast(data.message || 'Tin nhắn của bạn đã được gửi thành công!', 'success');
                })
                .catch(error => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                    showToast('Có lỗi xảy ra. Vui lòng thử lại sau.', 'error');
                    console.error('Error:', error);
                });
                */
            });
        }
    });
</script>
@endpush