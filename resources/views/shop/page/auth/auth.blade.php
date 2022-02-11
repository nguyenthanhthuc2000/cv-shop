@extends('shop.layout.master_layout')
@section('content')
    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                @include('shop.layout.alert')
                <div class="row">
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="form-main">
                            <div class="title">
                                <h4>Đăng nhập</h4>
                            </div>
                            <form class="form " method="post" action="{{ route('auth.login') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input name="email" class="form-control" minlength="10" maxlength="65" type="email" placeholder="">
                                            @error('email')
                                            <small style="color:red;    text-transform: capitalize;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Mật khẩu<span>*</span></label>
                                            <input name="password" class="form-control"  minlength="6" type="password" placeholder="">
                                            @error('password')
                                            <small style="color:red;    text-transform: capitalize;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">Đăng nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 mb-3">
                        <div class="form-main">
                            <div class="title">
                                <h4>Đăng ký - Họ tên và Email không thể thay đổi</h4>
                            </div>
                            <form class="form" method="post" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Họ và tên<span>*</span></label>
                                            <input name="name" maxlength="35" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Email đăng nhập<span>*</span></label>
                                            <input name="email" maxlength="65" type="email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Mật khẩu<span>*</span></label>
                                            <input name="password" minlength="6" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Mật khẩu xác nhận<span>*</span></label>
                                            <input name="password_enter" minlength="6" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">Đăng kí</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <!-- Map Section -->
{{--    <div class="map-section">--}}
{{--        <div id="myMap"></div>--}}
{{--    </div>--}}
    <!--/ End Map Section -->

@endsection
