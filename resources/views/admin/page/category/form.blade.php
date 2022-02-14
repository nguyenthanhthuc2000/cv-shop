@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        <form action="{{ route($route, isset($cat) ? encryptDecrypt($cat->id) : '') }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title-form">
                <h2 class="h3 mb-3">{{ $route == 'category.store' ? 'Thêm mới' : 'Cập nhật' }} danh mục</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" name="level" value="{{ isset($level) ? $level : '' }}">
                            <div class="form-group">
                                <label class="form-label">Tên danh mục <span style="color:red;">*</span>
                                    @error('name')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                    @if(Session::has('name'))
                                        <small style="color:red;">{{ session::get('name') }}</small>
                                    @endif
                                </label>
                                <input type="text" class="form-control" name="name" value="{{ isset($cat) ? $cat->name : old('name')}}" placeholder="Nhập tên danh mục">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Danh mục cấp {{ $level == 1 ? '0' : '1' }}  <span style="color:red;">*</span>
                                    @error('parent_id')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                                    @if($categorys->count() > 0)
                                        @foreach($categorys as $category)
                                            <option value="{{$category->id}}"
                                            @isset($cat)
                                                {{ $category->id == $cat->parent_id ? 'selected="selected"' : '' }}
                                                @endisset
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Không có dữ liệu</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Seo title</label>
                                <input class="form-control" placeholder="Nhập Seo title" value="{{ isset($cat) ? $cat->seo_title : old('seo_title') }}" name="seo_title" >
                            </div>
                            <div class="form-group">
                                <label class="form-label">Seo keywords</label>
                                <input class="form-control" placeholder="Nhập Seo keywords" value="{{ isset($cat) ? $cat->seo_keywords : old('seo_keywords') }}" name="seo_keywords" >
                            </div>
                            <div class="form-group">
                                <label class="form-label">Seo description</label>
                                <input class="form-control" placeholder="Seo description" value="{{ isset($cat) ? $cat->seo_description : old('seo_description') }}" name="seo_description">
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
