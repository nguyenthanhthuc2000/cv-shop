@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        @include('admin.layout.alert')
        <div class="title-form d-flex mb-3" style="justify-content: space-between">
            <h3 class=" ">Mã giảm giá</h3>
            <a href="{{ route('voucher.create')}}" class="btn__border btn__green"><i class="fas fa-plus-circle"></i> Thêm</a>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card flex-fill">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mã giảm giá</th>
                                <th>Mô tả</th>
                                <th class="text-center">Giảm</th>
                                <th class="d-none d-xl-table-cell text-center">Trạng thái</th>
                                <th class="d-none d-xl-table-cell text-right">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($vouchers->count() > 0)
                                @foreach($vouchers as $voucher)
                                    <tr>
                                        <td style="text-transform: uppercase">{{ $voucher->code }}</td>
                                        <td>{{ $voucher->name }}</td>
                                        <td class="text-center">
                                            @if($voucher->type == 1)
                                                {{ $voucher->number}} %
                                            @else
                                                {{ numberFormat($voucher->number)}} vnđ
                                            @endif
                                        </td>
                                        <td class="d-none d-xl-table-cell text-center">
                                            <label class="switch">
                                                <input type="checkbox" class="btn-status-voucher" data-id="{{ encryptDecrypt($voucher->id) }}" {{ $voucher->status == 0 ? '' : 'checked' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="d-none d-xl-table-cell text-right">
                                            <a href="{{ route('voucher.edit', encryptDecrypt($voucher->id)) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a href="{{ route('voucher.destroy', encryptDecrypt($voucher->id)) }}" class="btn-destroy-voucher"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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
                            {{ $vouchers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('/_admin/js/page/voucher.js') }}"></script>
@endpush
