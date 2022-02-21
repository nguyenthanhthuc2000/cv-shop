@extends('shop.layout.master_layout')
@section('content')

    <form  method="post" action="{{ route('order.store') }}">
        @csrf

    <!-- Start Checkout -->
    <section class="shop checkout section">
        @include('admin.layout.alert')
        <div class="container">
            @if(Session::has('carts') && count(Session::get('carts')) > 0)
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-form">
                        <h2>Nhập thông tin thanh toán</h2>
                        <p>Thanh toán online vui lòng nhắn tin cho fanpage facebook / zalo</p>
                        <!-- Form -->
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Họ và tên<span>*</span></label>
                                        <input type="text" name="name" placeholder="" required="required">
                                        @error('name')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input type="number" name="phone" placeholder="" required="required">
                                        @error('phone')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Tỉnh / TP</label>
                                        <select name="province" id="country">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Quận / huyện</label>
                                        <select name="district" id="country">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phường / xã / thị trấn</label>
                                        <select name="ward" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input type="text" name="note" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ nhận hàng (Ghi đầy đủ)<span>*</span></label>
                                        <input type="text" name="address" placeholder="" required="required">
                                        @error('address')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Form -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Hóa đơn</h2>
                            @php
                                $carts = Session::get('carts');

                                $totalCart = 0;
                                $totalCheckout = 0;
                                $totalVoucher = 0;

                                foreach ($carts as $cart){
                                    $price = $cart['price'];
                                    if($cart['price_pro'] > 0){
                                        $price = $cart['price_pro'];
                                    }
                                    $totalCart += $cart['qty'] * $price;
                                }
                            @endphp

                            @if(Session::has('voucher'))
                                @php
                                    $voucher = Session::get('voucher');

                                    if($voucher[0]['voucher_type'] == 1){
                                            $totalVoucher = ($totalCart/100) * $voucher[0]['voucher_number'];
                                        }
                                        else{
                                            $totalVoucher = $voucher[0]['voucher_number'];
                                        }

                                @endphp
                            @endif

                            @php
                                $totalCheckout = $totalCart - $totalVoucher;
                            @endphp
                            <div class="content">
                                <ul>
                                    <li>Hóa đơn<span>{{ numberFormat($totalCart) }}</span></li>
                                    @if(Session::get('voucher'))
                                        <li>Giảm<span> {{ numberFormat($totalVoucher) }} </span></li>
                                    @endif
                                    <li>(+) Giao hàng<span>Miễn phí</span></li>
                                    <li class="last">Tổng thanh toán<span> {{ numberFormat($totalCheckout) }} </span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Hình thức thanh toán</h2>
                            <div class="thanh-toan">
                                <div class="form-group">
                                    <select class="payment select__method_checkout" required="" name="method_checkout">
                                        <option value="0" >Thanh toán khi nhận hàng</option>
{{--                                         <option value="">ATM/MOMO</option>--}}
{{--                                         <option value="">PayPal</option>--}}
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
                                    <button class="btn">Xác nhận đặt hàng</button>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>
            </div>
            @else
            <h3>Không tìm thấy sản phẩm trong giỏ hàng cùa bạn, <a href="{{ route('home.index') }}">click để mua hàng ngay !</a></h3>
            @endif
        </div>
    </section>
    <!--/ End Checkout -->
    </form>

@endsection
@push('js')
    <script src="{{ asset('/_shop/js/page/cart.js') }}"></script>
@endpush
