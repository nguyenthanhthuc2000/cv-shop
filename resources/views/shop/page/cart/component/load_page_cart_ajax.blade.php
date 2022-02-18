<!-- Shopping Summery -->
@if($carts)
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
                @foreach($carts as $key => $cart)
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
                            <div class="input-group text-center">

                                <input type="number" data-id="{{ $cart['id'] }}" class="input-number pro-cart-qty"  min="1" max="100"  value="{{$cart['qty']}}">

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
                            <button type="button" class="delete-product-cart btn__style" data-id="{{$cart['id']}}">
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
