
<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Giao hàng miễn phí</h4>
                    <p>Hóa đơn từ 300.000 vnđ</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Trả hàng miễn phí</h4>
                    <p>Trả trong vòng 7 ngày</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Chất lượng</h4>
                    <p>100% sản phẩm chính hãng</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Giá tốt nhất</h4>
                    <p>Cam kết giá rẽ định nhất</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Đăng kí nhận tin</h4>
                        <p> Chúng tôi sẽ cập nhật những tin tức thị trường <span>sớm nhất</span> đến bạn</p>
                        <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Nhập email của bạn" required="" type="email">
                            <button class="btn">đăng kí</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <h4 style="margin-top:100px;font-size:14px; font-weight:600; color:#F7941D; display:block; margin-bottom:5px;">Eshop Free Lite</h4>
                        <h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
                                <p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
                                <div class="button" style="margin-top:30px;">
                                    <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="{{ route('home.index') }}"><img style="width: 50%;" src="{{ asset('_shop/images/logo_footer.png')}}" alt="#"></a>
                        </div>

                        <p class="text"><i class="fa-solid fa-gem"></i> &nbsp; {{ $setting->slogan }}</p>
                        <span class="call"><i class="fa-solid fa-phone mb-3"></i> &nbsp; Liên hệ với chúng tôi 24/7
                        </span>
                        <span  class="call">
                            <a href="tel:{{ $setting->hotline_1 }}">{{ $setting->hotline_1 }}</a>
                            <a>-</a>
                            <a href="tel:{{ $setting->hotline_2 }}">{{ $setting->hotline_2 }}</a>
                        </span>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Chính sách</h4>
                        <ul>
                            <li><a href="#">Nạp rút tiền</a></li>
                            <li><a href="#">Hoàn tiền, sản phẩm</a></li>
                            <li><a href="#">Đăng bài viết</a></li>
                            <li><a href="{{ route('order.check') }}">Kiểm tra đơn hàng</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Sản phẩm</h4>
                        <ul>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Liên hệ với chúng tôi</h4>
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <ul>
                                <li>
                                    <a href=""><i class="fa-solid fa-location-dot"></i> &nbsp; {{ $setting->address }}</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-solid fa-envelope"></i> &nbsp; {{ $setting->email }}</a>
                                </li>
                                <li>
                                    <span><a><i class="fa-solid fa-phone"></i> &nbsp;</a>  <a href="tel:{{ $setting->hotline_1 }}">{{ $setting->hotline_1 }}</a> <a
                                            >-</a>
                                    <a href="tel:{{ $setting->hotline_2 }}">{{ $setting->hotline_2 }}</a></span>
                                </li>
                                <li>
                                </li>
                            </ul>
                        </div>
                    </div>
                        <!-- End Single Widget -->
                    <div class="single-footer social">
                        <ul>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-flickr"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © 2022 {{ $setting->domain }}  -  All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="{{ asset('_shop/images/payments.png')}}" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->
