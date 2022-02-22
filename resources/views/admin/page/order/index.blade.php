@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        <div class="title-form d-flex mb-3" style="justify-content: space-between">
            <h3 class=" mb-0">Hóa đơn</h3>
        </div>
        @include('admin.layout.alert')
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card flex-fill">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th class="text-center">Khách hàng</th>
                                <th class="text-center">Tổng hóa đơn</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Thanh toán</th>
                                <th class="text-center">Ngày lập</th>
                                <th class="text-right">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($orders->count() > 0)
                                @foreach($orders as $order)
                                    <tr>
                                        <td style="text-transform: uppercase">{{ $order->order_code }}</td>
                                        <td class="text-center">{{ $order->customer->name }}</td>
                                        <td class="text-center">{{ numberFormat($order->total) }}</td>
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
                                        <td class="text-center">{{ $order->created_at }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('order.detail', encryptDecrypt($order->id)) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
{{--                                            <a href="{{ route('order.destroy', encryptDecrypt($order->id)) }}" class="btn-destroy-category"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">Không có dữ liệu</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="paginate-styling">
                            {{ $orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('/_admin/js/page/order.js') }}"></script>
@endpush
