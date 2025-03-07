<footer id="donate" class="mt-80">
    <div class="bg-dark bg-gradient">
        <div class="container ">
            <div class="row py-5 text-white g-3">
                <div class="col-12 col-md-5">
                    <img height="50" src="{{ asset('assets/images/logo/logo_site.webp') }}" alt="logo">
                    <p class="mt-2">Đọc truyện online, đọc truyện chữ, truyện hay. Website luôn cập nhật những bộ truyện mới thuộc các thể loại đặc sắc như truyện tiên hiệp, truyện kiếm hiệp, hay truyện ngôn tình một cách nhanh nhất. Hỗ trợ mọi thiết bị như di động và máy tính bảng.</p>
                    
                </div>
                <div class="col-12 col-md-7">
                    <div class="footer-section">
                        <h5 class="text-white mb-3">Thể Loại Truyện</h5>
                        <div class="footer-categories">
                            <a href="#" class="footer-category">Tiên Hiệp</a>
                            <a href="#" class="footer-category">Kiếm Hiệp</a>
                            <a href="#" class="footer-category">Ngôn Tình</a>
                            <a href="#" class="footer-category">Đô Thị</a>
                            <a href="#" class="footer-category">Huyền Huyễn</a>
                            <a href="#" class="footer-category">Xuyên Không</a>
                            <a href="#" class="footer-category">Trọng Sinh</a>
                            <a href="#" class="footer-category">Dị Giới</a>
                            <a href="#" class="footer-category">Võng Du</a>
                            <a href="#" class="footer-category">Quan Trường</a>
                            <a href="#" class="footer-category">Light Novel</a>
                            <a href="#" class="footer-category">Fanfiction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark">
        <div class="container py-3">
            <span class="copyright text-white">
                Copyright © {{ date('Y') }} {{ request()->getHost() }}
            </span>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
@stack('scripts')

</body>

</html>
