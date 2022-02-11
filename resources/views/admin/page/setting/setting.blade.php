@extends('admin.layout.master_layout')
@section('content')
    <div class="container-fluid p-0">
        @include('admin.layout.alert')
        <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="title-form d-flex mb-3" style="justify-content: space-between">
            <h3 class=" ">Cấu hình chung</h3>
            <button type="submit" class="btn btn__border btn__blue">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-check-circle align-middle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                Lưu
            </button>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                           value="{{ old('email') ? old('email') : $setting->email }}" placeholder="Nhập Email">
                                    @error('email')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control"
                                           value="{{ old('address') ? old('address') : $setting->address }}" placeholder="Nhập Địa chỉ">
                                    @error('address')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Tên miền</label>
                                    <input type="text" name="domain" class="form-control" value="{{old('domain') ? old('domain') : $setting->domain }}"
                                           placeholder="Nhập Domain">
                                      @error('domain')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Tên website</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') ? old('name') : $setting->name }}"
                                           placeholder="Nhập Tên website">
                                    @error('name')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Slogan</label>
                                    <input type="text" name="slogan" class="form-control"
                                           value="{{ old('slogan') ? old('slogan') : $setting->slogan }}"
                                           placeholder="Nhập Slogan">
                                    @error('slogan')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Thời gian hoạt động</label>
                                    <input type="text" name="open_time" class="form-control" value="{{ old('open_time') ? old('open_time') : $setting->open_time }}"
                                           placeholder="Nhập Thời gian hoạt động">
                                      @error('open_time')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="form-label">Zalo</label>
                                    <input type="text" name="zalo" class="form-control" value="{{ old('zalo') ? old('zalo') : $setting->zalo }}"
                                           placeholder="Nhập Zalo">
                                     @error('zalo')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Điện thoại 1</label>
                                    <input type="text" name="hotline_1" class="form-control" value="{{ old('hotline_1') ? old('hotline_1') : $setting->hotline_1 }}"
                                           placeholder="Nhập Điện thoại 1">
                                    @error('hotline_1')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Điện thoại 2</label>
                                    <input type="text" name="hotline_2" class="form-control" value="{{ old('hotline_2') ? old('hotline_2') : $setting->hotline_2 }}"
                                           placeholder="Nhập Điện thoại 2">
                                     @error('hotline_2')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Link Fanpage</label>
                                <input type="text" name="link_facebook" class="form-control" id="inputAddress"
                                       value="{{ old('link_facebook') ? old('link_facebook') : $setting->link_facebook }}"
                                       placeholder="Nhập Link Fanpage">
                                    @error('link_facebook')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group ">
                                <label class="form-label">Youtube</label>
                                <input type="text" name="link_youtube" value="{{ old('link_youtube') ? old('link_youtube') : $setting->link_youtube }}" class="form-control" placeholder="Youtube">
                                @error('link_youtube')
                                <small style="color:red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Link Google Map</label>
                                <input type="text" name="link_google_map" class="form-control" id="inputAddress2"
                                       value="{{ old('link_google_map') ? old('link_google_map') : $setting->link_google_map }}" placeholder="Nhập Link Google Map">
                                    @error('link_google_map')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Iframe Google Map</label>
                                <input type="text" name="iframe_google_map" class="form-control"
                                       value="{{ old('iframe_google_map') ? old('iframe_google_map') : $setting->iframe_google_map }}"
                                       placeholder="Nhập Iframe Google Map">
                                    @error('iframe_google_map')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputAddress2">Seo title</label>
                                <input type="text" name="seo_title" class="form-control" id="inputAddress2"
                                       value="{{ old('seo_title') ? old('seo_title') : $setting->seo_title }}"
                                       placeholder="Nhập Seo title">
                                    @error('seo_title')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Seo keywords</label>
                                <input type="text" name="seo_keywords" class="form-control" id="inputAddress2"
                                         placeholder="Nhập Seo keywords" value="{{ old('seo_keywords') ? old('seo_keywords') : $setting->seo_keywords }}">
                                    @error('seo_keywords')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Seo description</label>
                                <input type="text" name="seo_description" class="form-control" id="inputAddress2"
                                          placeholder="Nhập Seo description" value="{{ old('seo_description') ? old('seo_description') : $setting->seo_description }}">
                                    @error('seo_description')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn__border btn__blue"><i class="align-middle" data-feather="check-circle"></i> Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
