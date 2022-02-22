@extends('admin.layout.master_layout')
@section('content')

    <form>
        @csrf
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-muted">Payment No.</div>
                                    <strong style="text-transform: uppercase;">Mã HD: {{$order->order_code}}</strong>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <div class="text-muted">Thanh toán khi nhận hàng</div>
                                    <strong>Ngày đặt hàng: {{$order->created_at}}</strong>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="text-muted">Người mua</div>
                                    <strong>
                                        Tên: {{$order->customer->name}}
                                    </strong>

                                </div>
                                <div class="col-md-6 text-md-right">
                                    <p>
                                        <a href="tel:{{$order->customer->phone}}">
                                            Điện thoại: {{$order->customer->phone}}
                                        </a>
                                        <br>
                                        <a>
                                            Địa chỉ: {{$order->address}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th >Mã SP</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Giá bán</th>
                                    <th class="text-center">Giá KM</th>
                                    <th class="text-center">Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $tong = 0; ?>
                                @foreach($order_details as $key => $order_detail)
                                    <tr>

                                        <td  class="center">
                                            {{$order_detail->product->id}}
                                        </td >
                                        <td class="text-center">
                                            {{$order_detail->product->name}}
                                        </td>
                                        <td class="text-center">
                                            <img class="rounded" src="{{ getImage($order_detail->product->photo, 'product') }}" alt="Placeholder" width="80" height="60">
                                        </td>
                                        <td class="text-center ">
                                            {{$order_detail->product_qty}}
                                        </td>
                                        <td class="text-center">
                                            @if($order_detail->price_pro == 0)
                                                {{number_format($order_detail->price,0,',','.')}}
                                            @else
                                                <p style="    text-decoration: line-through; margin: 0;">{{number_format($order_detail->price,0,',','.')}}</p>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($order_detail->price_pro == 0)
                                                ---
                                            @else
                                                {{number_format($order_detail->price_pro,0,',','.')}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <?php $total = 0; ?>
                                            @if($order_detail->price_pro == 0)
                                                <?php $total = $order_detail->price * $order_detail->product_qty; ?>
                                            @else
                                                <?php $total = $order_detail->price_pro * $order_detail->product_qty; ?>
                                            @endif
                                            {{number_format($total,0,',','.')}}
                                            <?php $tong +=$total; ?>
                                        </td>
                                    </tr>

                                @endforeach
                                @php
                                    $giam = 0;
                                @endphp
                                <tr>
                                    <td colspan="4" >
                                    </td>
                                    <td colspan="2">
                                        Tổng hóa đơn
                                    </td>
                                    <td class="text-center">
                                        {{number_format($tong,0,',','.')}}
                                    </td>

                                </tr>
                                @if($order->voucher_id !== null )
                                    @php
                                        $voucher = $order->voucher;
                                            $giam = $voucher->type == 0 ? $voucher->number : ($tong/100)*$voucher->number;
                                    @endphp
                                    <tr>
                                        <td colspan="4" >
                                        </td>
                                        <td colspan="2">
                                            Giảm giá  {{ $voucher->type == 0 ? numberFormat($voucher->number).'vnđ' : $voucher->number.'%' }} ( {{  $voucher->code }} )

                                        </td>
                                        <td class="text-center">
                                            {{ numberFormat($giam) }}
                                        </td>

                                    </tr>
                                @endif
{{--                                @if($Coupons == true)--}}
{{--                                    <tr>--}}
{{--                                        <?php $giam = 0; ?>--}}
{{--                                        <td colspan="5">--}}
{{--                                            Mã giảm giá {{$Coupons->code}}--}}
{{--                                        </td>--}}
{{--                                        <td class="center w-100px">--}}
{{--                                            @if($Coupons->type == 'phantram')--}}
{{--                                                -{{$Coupons->number}}%--}}
{{--                                                <?php--}}
{{--                                                $giam = ($tong/100)*$Coupons->number;--}}
{{--                                                ?>--}}
{{--                                            @else--}}
{{--                                                -{{number_format($Coupons->number,0,',','.')}}--}}
{{--                                                <?php $giam = $Coupons->number; ?>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td class="center w-100px">--}}
{{--                                            -{{number_format($giam,0,',','.')}}--}}
{{--                                        </td>--}}

{{--                                    </tr>--}}
{{--                                @endif--}}
                                <tr>
                                    <td colspan="4">
                                    </td>
                                    <td colspan="2">
                                        Phí giao hàng
                                    </td>
                                    <td class="text-center">
                                        @if($order->feeship == 0)
                                            Miễn phí
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="4" >
                                    </td>
                                    <td colspan="2">
                                        Tổng thanh toán
                                    </td>
                                    <td class="text-center">
                                        {{number_format($tong-$giam,0,',','.')}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="card">
                                <div class="card-body  row">
                                    <div class="col-md-3 ">
                                        Trạng thái đơn hàng
                                        <select class="custom-select mb-3 order_status " data-id="{{ encryptDecrypt($order->id) }}">
                                            <option  value="0" {{ $order->status == 0 ? 'selected ' : '' }}>Chờ xử lí</option>
                                            <option  value="1" {{ $order->status == 1 ? 'selected ' : '' }} >Đang giao hàng</option>
                                            <option  value="2" {{ $order->status == 2 ? 'selected ' : '' }}>Thành công</option>
                                            <option  value="3" {{ $order->status == 3 ? 'selected ' : '' }}>Hủy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 ">
                                        Trạng thái thanh toán
                                        <select class="custom-select mb-3 order_payment_status " data-id="{{ encryptDecrypt($order->id) }}">
                                            <option  value="0" {{ $order->payment_status == 0 ? 'selected ' : '' }}>Chưa thanh toán</option>
                                            <option  value="1" {{ $order->payment_status == 1 ? 'selected ' : '' }} >Đã thanh toán</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if($order->note !== null)
                            <div class="text-center">
                                <br>
                                <p class="text-sm">
                                    <strong>Lưu ý của khách hàng:</strong>
                                    <span style="color: red;">{{ $order->note }}</span>
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script src="{{ asset('/_admin/js/page/order.js') }}"></script>
@endpush

