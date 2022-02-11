
<!DOCTYPE html>
<html lang="zxx">
@include('shop.layout.head')
<body class="js">
@include('shop.layout.header')
<!-- Preloader -->
{{--<div class="preloader">--}}
{{--    <div class="preloader-inner">--}}
{{--        <div class="preloader-icon">--}}
{{--            <span></span>--}}
{{--            <span></span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Preloader -->


@yield('slider')

@yield('content')

@include('shop.layout.footer')

@include('shop.layout.script')
</body>
</html>
