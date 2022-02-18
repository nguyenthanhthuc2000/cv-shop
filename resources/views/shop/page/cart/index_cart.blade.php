@extends('shop.layout.master_layout')
@section('content')


    <!-- Shopping Cart -->
    <div class=" cart-main section">
        <div class="container">
            <div class="row">
                <div class="col-12 cart-main-ajax">
                    <h6 class="text-center">Đang tải dữ liệu...</h6>
                <!--/ End Shopping Summery -->
                </div>
            </div>
            @if(Session::has('carts'))
                <div class="row">
                    <div class="col-12">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="left">
                                        <div class="coupon">
                                            <form method="POST" style="display: flex;justify-content: space-around;" >
                                                <input name="coupon" placeholder="Mã giảm giá">
                                                <button class="btn" type="button" >Cập nhật</button>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Tổng giỏ hàng<span> VNĐ</span></li>
                                            <li>Phí giao hàng<span>Miễn phí</span></li>

                                            <li>Mã giảm <span>- VNĐ</span></li>
                                            <li class="last">Tổng cộng<span> VNĐ</span></li>
                                            <li class="last">Tổng cộng<span> VNĐ</span></li>
                                        </ul>
                                        <div class="button5">
                                                <a href="" class="btn">Thanh toán</a>
                                                <a href="" class="btn">Thanh toán</a>
                                            <a href="" class="btn">Tiếp tục mua hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!--/ End Shopping Cart -->

@endsection
@push('js')
    <script src="{{ asset('/_shop/js/page/cart.js') }}"></script>
@endpush
