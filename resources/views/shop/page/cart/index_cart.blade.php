@extends('shop.layout.master_layout')
@section('content')


    <!-- Shopping Cart -->
    <div class=" cart-main section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <!-- Shopping Summery -->
                    @if(Session::get('carts') == true )
                        <form method="POST" action="">
                            @csrf
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                    <tr class="main-hading">
                                        <th>Hình ảnh</th>
                                        <th class="min-w-300">Tên SP</th>
                                        <th>Giá SP</th>
                                        <th>Giá KM</th>
                                        <th class="text-center">Số Lượng</th>
                                        <th class="text-center">Tổng VNĐ</th>
                                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $Subtotal = 0; ?>
                                    @foreach(Session::get('carts') as $key => $cart)
                                        <tr>
                                            <td ><img src="{{ getImage($cart['photo'], 'product') }}" alt="#"></td>
                                            <td class="min-w-300">
                                                <p class="product-name"><a href="{{ route('product.detail', $cart['slug']) }}">{{$cart['name']}}</a></p>
                                                <p class="product-des">Mô tả...</p>
                                            </td>
                                            <td class="price @if($cart['price_pro'] > 0)  price_old @endif">
                                                <span>
								                    {{number_format($cart['price'],0,',','.')}}
                                                </span>
                                            </td>
                                            <td class="price" data-title="Price"><span>
								            @if($cart['price_pro'] == 0 )
                                                        ---
                                                    @else
                                                        {{number_format($cart['price_pro'],0,',','.')}}  </span></td>
                                            @endif
                                            <td class="qty"><!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus"  data-field="qty[{{$cart['id']}}]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="qty[{{$cart['id']}}]" class="input-number"  data-min="1" data-max="100"  value="{{$cart['qty']}}">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty[{{$cart['id']}}]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </td>
                                            <td class="total-amount">
                                                <span>
                                                    @php $total = 0; @endphp
								                    @if($cart['price_pro'] == 0)
                                                        @php $total = $cart['price'] * $cart['qty']; @endphp
                                                        {{ number_format($total, 0, ',', '.') }}
                                                    @else
                                                        @php $total = $cart['price_pro'] * $cart['qty']; @endphp
                                                        {{ number_format($total, 0, ',', '.') }}
                                                    @endif
                                                    @php $Subtotal += $total; @endphp
								                </span>
                                            </td>
                                            <td class="action">
                                                <button type="button" class="del-product btn__style" data-session="{{$cart['id']}}">
                                                    <i class="ti-trash remove-icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    @else
                        <h3>Không tìm thấy sản phẩm trong giỏ hàng cùa bạn, <a href="{{ route('home.index') }}">click để mua hàng ngay !</a></h3>
                @endif
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
