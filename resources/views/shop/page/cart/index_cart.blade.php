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
            <div class="load-total-cart-ajax">
                Đang tải dữ liệu...
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

@endsection
@push('js')
    <script src="{{ asset('/_shop/js/page/cart.js') }}"></script>
@endpush
