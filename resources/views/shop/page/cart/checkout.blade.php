@extends('shop.layout.master_layout')
@section('content')


    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-form">
                        <h2>Nhập thông tin thanh toán</h2>
                        <p>Thanh toán online vui lòng nhắn tin cho fanpage facebook / zalo</p>
                        <!-- Form -->
                        <form class="form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Họ và tên<span>*</span></label>
                                        <input type="text" name="name" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input type="number" name="name" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Tỉnh / TP<span>*</span></label>
                                        <select name="country_name" id="country">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Quận / huyện<span>*</span></label>
                                        <select name="country_name" id="country">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phường / xã / thị trấn<span>*</span></label>
                                        <select name="country_name" id="country">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input type="text" name="name" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ nhận hàng<span>*</span></label>
                                        <input type="text" name="address" placeholder="" required="required">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Hóa đơn</h2>
                            <div class="content">
                                <ul>
                                    <li>Hóa đơn<span>$330.00</span></li>
                                    <li>Giảm<span>$330.00</span></li>
                                    <li>(+) Giao hàng<span>Miễn phí</span></li>
                                    <li class="last">Tổng thanh toán<span>$340.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Hình thức thanh toán</h2>
                            <div class="thanh-toan">
                                <div class="form-group">
                                    <select class="payment select__method_checkout" required="">
                                        <option value="tienmat">Thanh toán khi nhận hàng</option>
                                         <option value="atm">ATM/MOMO</option>
                                         <option value="atm">PayPal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Payment Method Widget -->
                        <div class="single-widget payement">
                            <div class="content">
                                <img src="{{asset('_shop/images/payment-method.png')}}" alt="#">
                            </div>
                        </div>
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <a href="#" class="btn">Xác nhận đặt hàng</a>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Checkout -->

@endsection
@push('js')
    <script src="{{ asset('/_shop/js/page/cart.js') }}"></script>
@endpush
