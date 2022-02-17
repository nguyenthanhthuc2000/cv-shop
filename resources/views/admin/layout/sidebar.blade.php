<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('home.index') }}">
            <span class="align-middle" style="text-transform: uppercase">{{ $setting->domain }}</span>
        </a>


        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('admin.index') }}">
                <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Tổng quan</span>
            </a>
        </li>

        <ul class="sidebar-nav main-menu">
            <li class="sidebar-header">
                Quản lí
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('product.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sản phẩm</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Đơn hàng</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('voucher.index') }}">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Mã giảm giá</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#dm" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Danh mục</span>
                </a>
                <ul id="dm" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('category1.index') }}">Danh mục cấp 1</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('category2.index') }}">Danh mục cấp 2</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#bv" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Bài viết</span>
                </a>
                <ul id="bv" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('service.manage') }}">Dịch vụ</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('news.manage') }}">Chia sẻ</a></li>
                </ul>
            </li>
            <li class="sidebar-header">
                Hệ thống
            </li>

            <li class="sidebar-item">
                <a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Hình ảnh</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('image.list', 'album') }}">Album</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('image.list', 'slider') }}">Slider</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('image.list', 'banner') }}">Banner</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('image.type', 'logo-header') }}">Logo header</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('image.type', 'logo-footer') }}">Logo footer</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#tk" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Tài khoản</span>
                </a>
                <ul id="tk" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Phân quyền</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Tài khoản hệ thống</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Tài khoản người dùng</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Khách hàng</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.setting') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Cài đặt</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('auth.logout') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Đăng xuất</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components?
                </div>
                <a href="#" target="_blank" class="btn btn-outline-primary btn-block">Upgrade</a>
            </div>
        </div>
    </div>
</nav>
