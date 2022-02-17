@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Thống kê 30 ngày gần đây</strong> </h3>
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
                                    <h5 class="card-title mb-4">Truy cập</h5>
                                    <h1 class="display-5 mt-1 mb-3">2.382</h1>
                                    <div class="mb-1">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Doanh thu sản phẩm</h5>
                                    <h1 class="display-5 mt-1 mb-3">2.382</h1>
                                    <div class="mb-1">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Đơn hàng</h5>
                                    <h1 class="display-5 mt-1 mb-3">2.382</h1>
                                    <div class="mb-1">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Doanh thu tin tức</h5>
                                    <h1 class="display-5 mt-1 mb-3">2.382</h1>
                                    <div class="mb-1">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Đơn hàng chờ xử lí</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Start Date</th>
                            <th class="d-none d-xl-table-cell">End Date</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Assignee</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        <tr>
                            <td>Project Fireball</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-danger">Cancelled</span></td>
                            <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        <tr>
                            <td>Project Hades</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Sharon Lessman</td>
                        </tr>
                        <tr>
                            <td>Project Nitro</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-warning">In progress</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        <tr>
                            <td>Project Phoenix</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-success">Done</span></td>
                            <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        <tr>
                            <td>Project X</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Sharon Lessman</td>
                        </tr>
                        <tr>
                            <td>Project Romeo</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Christina Mason</td>
                        </tr>
                        <tr>
                            <td>Project Wombat</td>
                            <td class="d-none d-xl-table-cell">01/01/2020</td>
                            <td class="d-none d-xl-table-cell">31/06/2020</td>
                            <td><span class="badge badge-warning">In progress</span></td>
                            <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
