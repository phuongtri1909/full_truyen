<footer id="donate" class="mt-80">
    <div class="bg-site">
        <div class="container ">
            <div class="row py-5 text-dark g-3">
                <div class="col-12 col-md-5">
                    <img height="50" src="{{ asset('assets/images/logo/logo_site.webp') }}" alt="logo">
                    <p class="mt-2">Đọc truyện online, đọc truyện chữ, truyện hay. Website luôn cập nhật những bộ truyện mới thuộc các thể loại đặc sắc như truyện tiên hiệp, truyện kiếm hiệp, hay truyện ngôn tình một cách nhanh nhất. Hỗ trợ mọi thiết bị như di động và máy tính bảng.</p>
                    
                </div>
                <div class="col-12 col-md-7">
                    <div class="footer-section">
                        <div class="d-flex align-items-baseline">
                            <i class="fa-regular fa-rectangle-list fa-xl me-2"></i>
                            <h5 class="text-dark mb-3 fw-bold">Thể Loại Truyện</h5>
                        </div>
                        <div class="footer-categories ">
                            @foreach ($topCategories as $category)
                                <a href="{{ route('categories.story.show', $category->slug) }}"
                                    class="footer-category text-dark">{{ $category->name }}</a>
                            @endforeach
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <span class="copyright text-dark">
                    Copyright © {{ date('Y') }} {{ request()->getHost() }}
                </span>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
@stack('scripts')

</body>

</html>
