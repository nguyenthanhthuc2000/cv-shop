@extends('shop.layout.master_layout')
@section('content')

    <section class="shop-newsletter section">
        <div class="container">
            @include('admin.layout.alert')
            <div class="inner-top">
                <div class="row" style="    justify-content: center;">
                    <div class="col-10 mb-5">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4 class="mb-3">Tra cứu lịch sử mua hàng</h4>
                            <form action="{{ route('order.check') }}" method="GET" class="newsletter-inner">
                                @csrf

                                <input name="phone" placeholder="Nhập số điện thoại của bạn" required="" value="{{ old('phone') }}" type="number">
                                <button class="btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                    @if(isset($orders) && count($orders) > 0)
                        <div class="col-10">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Mã HD</th>
                                <th scope="col" class="text-center">Khách hàng</th>
                                <th scope="col" class="text-center">Tổng HD</th>
                                <th scope="col" class="text-center">Trạng thái</th>
                                <th scope="col" class="text-center">Thanh toán</th>
                                <th scope="col" class="text-center">Ngày đặt</th>
                                <th scope="col" class="text-right">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row" style="text-transform: uppercase">{{ $order->order_code }}</th>
                                    <td class="text-center">
                                        {{ $order->customer->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ numberFormat($order->total) }}
                                    </td>
                                    <td class="text-center">
                                        @if($order->status == 0)
                                            Chờ xử lí
                                        @elseif($order->status == 1)
                                            Đang giao hàng
                                        @elseif($order->status == 2)
                                            Thành công
                                        @elseif($order->status == 3)
                                            Đã hủy
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($order->payment_status == 0)
                                            Chưa thanh toán
                                        @elseif($order->payment_status == 1)
                                            Đã thanh toán
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $order->created_at }}
                                    </td>
                                    <td class="text-right">
                                        <button class="p-2 btn-detail-order" style="background: blue; color: #fff;" data-toggle="modal" data-target="#exampleModal" data-id="{{ encryptDecrypt($order->id) }}">Xem</button>
                                        @if($order->status == 0)
                                        <button class="p-2 btn-update-status-order-user"  data-id="{{ encryptDecrypt($order->id) }}" style="background: red; color: #fff;">Hủy</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @elseif(isset($orders) && count($orders) == 0 && request()->get('phone') !== '')
                        <div class="col-lg-8 offset-lg-2 col-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="alert-message">
                                    <strong>Error!</strong> Không tìm thấy kết quả
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="margin: 5px 10px 0;">Chi tiết hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <table class="table" style="margin: 70px 30px;">
                                <thead>
                                <tr>
                                    <th scope="col">Tên SP</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Số lượng</th>
                                    <th scope="col" class="text-center">Giá bán</th>
                                    <th scope="col" class="text-right">Giá KM</th>
                                </tr>
                                </thead>
                                <tbody id="main-order">
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script src="{{ asset('/_shop/js/page/cart.js') }}"></script>
@endpush
