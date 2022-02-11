
<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> {{ $setting->hotline_1 }}</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-bettwen">
                        <ul class="list-main">
                            <li><i class="ti-email"></i> {{ $setting->email }}</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-alarm-clock"></i> <a href="#">{{ $setting->open_time }}</a></li>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home.index') }}"><img src="{{asset('_shop/images/logo.png')}}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form>
                                <input name="search" class="form-control" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="{{  Auth::check() ? '#' : route('auth.index') }}" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Items</span>
                                    <a href="cart.html">View Cart</a>
                                </div>
                                <ul class="shopping-list" style=" height: 200px;overflow-y: scroll;">
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Necklace</a></h4>
                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class=""><a href="{{ route('home.index') }}">Trang chủ</a></li>
{{--                                            <li class="active"><a >Trang chủ</a></li>--}}
                                            <li class="menu_top"><a href="http://localhost/noithat/san-pham">Rao vặt<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="http://localhost/noithat/san-pham/noi-that-van-phong">Nội thất văn phòng
                                                            <i class=" ti-angle-down "></i>
                                                        </a>
                                                        <ul class="dropdown2">
                                                            <li><a href="http://localhost/noithat/san-pham/ban-hop">Bàn họp</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/ghe-van-phong">Ghế văn phòng</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/tu-ho-so">Tủ hồ sơ</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/ban-giam-doc">Bàn giám đốc</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/ban-lam-viec">Bàn làm việc</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="http://localhost/noithat/san-pham/noi-that-spa">Nội thất Spa
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu_top"><a href="http://localhost/noithat/san-pham">Phụ kiện<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="http://localhost/noithat/san-pham/noi-that-van-phong">Nội thất văn phòng
                                                            <i class=" ti-angle-down "></i>
                                                        </a>
                                                        <ul class="dropdown2">

                                                            <li><a href="http://localhost/noithat/san-pham/ban-hop">Bàn họp</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/ghe-van-phong">Ghế văn phòng</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/tu-ho-so">Tủ hồ sơ</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/ban-giam-doc">Bàn giám đốc</a></li>
                                                            <li><a href="http://localhost/noithat/san-pham/ban-lam-viec">Bàn làm việc</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="http://localhost/noithat/san-pham/noi-that-spa">Nội thất Spa

                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Hạt giống<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ route('product.list', 'category') }}">Cây cảnh</a></li>
                                                    <li><a href="product.html">Cá cảnh</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Cá giống<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ route('product.list', 'category') }}">Cây cảnh</a></li>
                                                    <li><a href="product.html">Cá cảnh</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Dịch vụ <i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="cart.html">Lắp đặt hồ thủy sinh</a></li>
                                                </ul>
                                            </li>
                                            <li class=""><a href="#">Tin tức</a></li>
                                            <li><a href="#">Tài khoản <i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    @if(Auth::check())
                                                        @if(checkAdmin())
                                                        <li><a href="{{ route('admin.index') }}">Quản lí website</a></li>
                                                        @endif
                                                        <li><a href="#">Thông tin</a></li>
                                                        <li><a href="#">Sản phẩm</a></li>
                                                        <li><a href="{{ route('auth.logout') }}">Đăng xuất</a></li>
                                                    @else
                                                        <li><a href="{{ route('auth.index') }}">Đăng nhập</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
