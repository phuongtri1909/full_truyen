<footer id="donate">
    <div class="bg-dark bg-gradient">
        <div class="container ">
            <div class="row py-5 text-white g-3">
                <div class="col-12 col-md-6">
                    <h5 class="mb-4">CON ĐƯỜNG BÁ CHỦ</h5>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-center" style="height: 150px;">
                                    <a target="_blank" href="https://www.youtube.com/channel/UClUgvbX62pg2XFPnRWaiSgQ"
                                        class="text-decoration-none text-dark text-center">
                                        <h6 class="info-title">YOUTUBE</h6>
                                        <img src="{{ asset('assets/images/ytb_logo.png') }}" alt="logo_ytb" 
                                            class="img-fluid" >
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-center" style="height: 150px;">
                                    <a target="_blank" href="https://www.facebook.com/groups/conduongbachu.akayhau/"
                                        class="text-decoration-none text-dark text-center">
                                        <h6 class="info-title">GROUP FACEBOOK</h6>
                                        <img src="{{ asset('assets/images/Facebook_Logo.png') }}" alt="logo_fb" 
                                            class="img-fluid" style="height: 70px; object-fit: contain;">
                                    </a>
                                </div>
                            </div>
                        </div>
                 
                    </div>
                    
                </div>
                <div class="col-12 col-md-6">
                    <div class="footer-section">
                        <h5 class="text-white mb-3">ỦNG HỘ TÁC GIẢ AkayHau</h5>
                        <div class="donation-info">
                            <ul class="list-unstyled ">
                                <li class="mb-2 d-flex flex-column align-items-start">
                                    <div class="mb-3">
                                        <i class="fas fa-university me-2"></i>
                                        <span class="fw-bold">Techcombank:</span>
                                    </div>
                                    <img src="{{ asset('assets/images/techcombank.jpg') }}" alt="banking-techcombank" class="" height="250">
                                </li>
                                
                                <li class="mb-2">
                                    <i class="fas fa-university me-2"></i>
                                    <span class="fw-bold">Agribank:</span>
                                    1809205083252 (Cờ Đỏ Cần Thơ II) - NGUYEN PHUOC HAU
                                </li>
                                
                                <li class="mb-2">
                                    <i class="fas fa-wallet me-2"></i>
                                    <span class="fw-bold">Momo/ViettelPay:</span>
                                    0942973261
                                </li>
                                
                                <li class="mb-2">
                                    <i class="fab fa-paypal me-2"></i>
                                    <span class="fw-bold">Paypal:</span>
                                    nguyenphuochau12t2@gmail.com
                                </li>
                            </ul>
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
