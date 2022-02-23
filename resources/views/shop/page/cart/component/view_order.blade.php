@if($order !== null)

    <?php
        $totalCart = 0;
        $totalVoucher = 0;
        $voucher = $order->voucher;
    ?>
    @foreach($order_details as $o)
    <tr>
        <th scope="row">{{ $o->product->name }}</th>
        <td class="text-center"><img src="{{ getImage($o->product->photo) }}" style="width: 70px; height: 50px;" alt=""></td>
        <td class="text-center">{{ $o->product_qty }}</td>
        <td class="text-center">{{ numberFormat($o->price) }}</td>
        <td class="text-right">{{ numberFormat($o->price_pro) }}</td>
    </tr>

        @php
          $price = $o->price;
           if($o->price_pro > 0){
               $price = $o->price_pro;
           }
           $totalCart += $o->product_qty * $price;


        @endphp
    @endforeach
    <tr>
        <td colspan="2"></td>
        <td colspan="2" class="text-left">Tổng hóa đơn</td>
        <td class="text-right">{{ numberFormat($totalCart) }} vnđ</td>
    </tr>
    @if($voucher !== null)
        @php
            if($voucher->type == 1){
                $totalVoucher = ($totalCart/100) * $voucher->number;

                $totalCart = $totalCart - $totalVoucher;
            }
            else{
                $totalVoucher = $voucher->number;

                $totalCart = $totalCart - $totalVoucher;
            }
        @endphp
    <tr>
        <td colspan="2"></td>
        <td colspan="2" class="text-left">Giảm giá</td>
        <td class="text-right">{{ numberFormat($totalVoucher) }} vnđ</td>
    </tr>
    @endif
    <tr>
        <td colspan="2"></td>
        <td colspan="2" class="text-left">Tổng thanh toán</td>
        <td class="text-right">{{ numberFormat($order->total) }} vnđ</td>
    </tr>
    <tr>
        <td class="text-left" colspan="5">Ghi chú: {{ $order->note }}</td>
    </tr>
    <tr>
        <td class="text-left" colspan="5">Địa chỉ giao hàng: {{ $order->address }}</td>
    </tr>
@else
    <tr>
        <td class="text-left" colspan="5">Không có dữ liệu</td>
    </tr>
@endif
