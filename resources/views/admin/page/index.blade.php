@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Thống kê </strong> </h3>
            </div>

{{--            <div class="col-auto ml-auto text-right mt-n1">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">--}}
{{--                        <li class="breadcrumb-item"><a href="#">AdminKit</a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>--}}
{{--                        <li class="breadcrumb-item active" aria-current="page">Analytics</li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Tổng sản phẩm</h5>
                                    <h1 class="display-5 mt-1 mb-3">---</h1>
                                    <div class="mb-1">
{{--                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>--}}
{{--                                        <span class="text-muted">Since last week</span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Doanh thu</h5>
                                    <h1 class="display-5 mt-1 mb-3">---</h1>
                                    <div class="mb-1">
{{--                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>--}}
{{--                                        <span class="text-muted">Since last week</span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Đơn hàng</h5>
                                    <h1 class="display-5 mt-1 mb-3">---</h1>
                                    <div class="mb-1">
{{--                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>--}}
{{--                                        <span class="text-muted">Since last week</span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Doanh thu tin tức</h5>
                                    <h1 class="display-5 mt-1 mb-3">---</h1>
                                    <div class="mb-1">
{{--                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>--}}
{{--                                        <span class="text-muted">Since last week</span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
