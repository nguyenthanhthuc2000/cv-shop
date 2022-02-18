@if(Session::has('carts'))
    @if(count(Session::get('carts')) > 0)
        <?php
        $totalCart = 0;
        foreach (Session::get('carts') as $cart){
            $price = $cart['price'];
            if($cart['price_pro'] > 0){
                $price = $cart['price_pro'];
            }
            $totalCart += $cart['qty'] * $price;
        }

        ?>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form style="display: flex;justify-content: space-around;" >
                                        <input name="coupon" id="voucher" placeholder="Mã giảm giá">
                                        <button class="btn btn-add-voucher" type="button" >Cập nhật</button>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Tổng giỏ hàng<span>{{ numberFormat($totalCart) }} VNĐ</span></li>
                                    <li>Phí giao hàng<span>Miễn phí</span></li>

                                    @if(Session::has('voucher'))
                                        <?php
                                        $voucher = Session::get('voucher');
                                        $giam = 0;

                                        if($voucher[0]['voucher_type'] == 1){
                                            $giam = ($totalCart/100) * $voucher[0]['voucher_number'];

                                            $totalCart = $totalCart - $giam;
                                        }
                                        else{
                                            $giam = $voucher[0]['voucher_number'];

                                            $totalCart = $totalCart - $giam;
                                        }
                                        ?>
                                        <li>Mã giảm giá<span>-{{ numberFormat($giam) }} VNĐ</span></li>
                                    @endif
                                    <li class="last">Tổng thanh toán<span>{{ numberFormat($totalCart) }} VNĐ</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="{{ route('home.checkout') }}" class="btn">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>

    @else
        <span></span>
    @endif

@else
    <span></span>
@endif
