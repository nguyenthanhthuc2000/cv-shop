
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
                                <input type="text" placeholder="Tìm kiếm..." name="search">
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
                                <input name="search" class="form-control" placeholder="Tìm kiếm..." type="search">
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
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">0</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span><span class="total-count">0</span> Items</span>
                                    <a href="cart.html">Giỏ hàng</a>
                                </div>
                                <ul class="shopping-list" style=" height: 200px;overflow-y: scroll;">
                                    <li>
                                       Không có dữ liệu
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Tổng</span>
                                        <span class="total-amount">0</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Thanh toán</a>
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
                                            @foreach($categories as $cat)
                                                <?php
                                                    $categories1 = $cat->childCategories;
                                                ?>
                                                    <li class="menu_top">
                                                    <a href="{{ route('product.cat', $cat->slug) }}">{{ $cat->name }} @if($categories1->count() > 0 ) <i class="ti-angle-down"></i> @endif</a>
                                                        @if($categories1->count() > 1)
                                                        <ul class="dropdown">
                                                            @foreach($categories1 as $cat1)

                                                                <?php
                                                                $categories2 = $cat1->childCategories;
                                                                ?>

                                                            <li><a href="{{ route('product.cat', $cat1->slug) }}">{{ $cat1->name }}
                                                                    @if($categories2->count() > 0 ) <i class="ti-angle-down"></i> @endif
                                                                </a>
                                                                @if($categories2->count() > 1)
                                                                <ul class="dropdown2">
                                                                    @foreach($categories2 as $cat2)
                                                                    <li><a href="{{ route('product.cat', $cat2->slug) }}">{{ $cat2->name }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                </li>
                                            @endforeach
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
