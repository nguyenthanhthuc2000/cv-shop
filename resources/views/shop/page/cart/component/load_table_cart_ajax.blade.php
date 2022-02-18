@if(count($carts) > 0)
    @foreach($carts as $cart)
    <li>
{{--        <a href="#" class="remove" title="Remove this item" ><i class="fa fa-remove"></i> </a>--}}
        <a class="cart-img"><img src="{{ getImage($cart['photo'], 'product') }}" alt="#"></a>
        <h4><a href="{{ route('product.detail', $cart['slug']) }}" class="text-split-1">{{ $cart['name'] }}</a></h4>
        <p class="quantity">{{ $cart['qty'] }}x -
            @if($cart['price_pro'] > 0)
            <span class="amount">{{ numberFormat($cart['price_pro']) }}</span>

            <span class="amount" style="text-decoration: line-through;color: #0000003b;">{{ numberFormat($cart['price']) }}</span>
            @else
                <span class="amount">{{ numberFormat($cart['price']) }}</span>
            @endif
        </p>
    </li>
    @endforeach
@else
    <li>Không có dữ liệu</li>
@endif
