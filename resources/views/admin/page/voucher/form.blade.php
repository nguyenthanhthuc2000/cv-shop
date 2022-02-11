@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        <form action="{{ route($route, isset($voucher) ? encryptDecrypt($voucher->id) : '') }}" method="POST">
            @csrf
            <div class="title-form d-flex" style="justify-content: space-between">
                <h2 class="h3 mb-3">Thông tin mã giảm giá</h2>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tên mã giảm giá
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ isset($voucher) ? $voucher->name : '' }}" placeholder="Nhập tên mã giảm giá">
                        @error('name')
                        <small style="color:red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mã giảm giá(max 15 kí tự | Không dấu dính liền)
                        </label>
                        <input type="text" class="form-control" name="code" value="{{ isset($voucher) ? $voucher->code : '' }}" placeholder="Nhập Mã giảm giá">
                        @error('code')
                        <small style="color:red;">{{ $message }}</small>
                        @enderror
                        @if(Session::has('errorcode'))
                            <small style="color:red;">{{ session::get('errorcode') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputState">Hình thức giảm
                        </label>
                        <select id="inputState" class="form-control" name="type">
                            <option value="0"
                                @isset($voucher)
                                    {{ $voucher->type == 0 ? 'selected' : '' }}
                                @endisset
                            >
                                Giảm theo số tiền
                            </option>
                            <option value="1"
                                @isset($voucher)
                                    {{ $voucher->type == 1 ? 'selected' : '' }}
                                @endisset
                            >
                                Giảm theo phần trăm
                            </option>
                        </select>
                        @error('type')
                        <small style="color:red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Số giảm
                        </label>
                        <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="number" value="{{ isset($voucher) ? $voucher->number : '' }}" placeholder="Nhập số giảm giá">
                        @error('number')
                        <small style="color:red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div style="text-align: end;" class="col-12">
                    <button type="submit" class="btn btn__border btn__blue"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Lưu</button>
                </div>
            </div>
            </div>
            </div>
        </form>
    </div>
@endsection
