@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        <div class="container-fluid p-0">
            <form action="{{ route($route, isset($product) ? encryptDecrypt($product->id) : '') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="title-form d-flex mb-3" style="justify-content: space-between">
                    <h2 class="h3">Thông tin sản phẩm</h2>
                    <button type="submit" class="btn btn-primary btn__border btn__blue">
                        <i class="align-middle" data-feather="check-circle"></i> Lưu
                    </button>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Tên sản phẩm <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                                           value="{{ isset($product) ? $product->name : old('name')}}" required>
                                    @error('name')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nội dung <span style="color:red;">*</span></label>
                                    <textarea class="form-control" placeholder="Textarea" id="ckeditor" required
                                              name="contents">{{ isset($product) ? $product->content : old('contents')}}</textarea>
                                    @error('contents')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mô tả sản phẩm</label>
                                    <textarea class="form-control" rows="5"
                                              name="desc">{{ isset($product) ? $product->desc : old('desc')}}</textarea>
                                    @error('ckeditor_desc')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Seo title</label>
                                    <textarea class="form-control" placeholder="Nhập Seo title" name="seo_title"
                                              rows="2">{{ isset($product) ? $product->seo_title : old('seo_title')}}</textarea>
                                    @error('seo_title')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Seo keywords</label>
                                    <textarea class="form-control" placeholder="Nhập Seo keywords" rows="2"
                                              name="seo_keywords">{{ isset($product) ? $product->seo_keywords : old('seo_keywords')}}</textarea>
                                    @error('seo_keywords')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Seo description</label>
                                    <textarea class="form-control" placeholder="Nhập Seo description" rows="2"
                                              name="seo_description">{{ isset($product) ? $product->seo_description : old('seo_description')}}</textarea>
                                    @error('seo_description')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputState">Danh mục cấp 1 <span style="color:red;">*</span></label>
                                    <select id="inputState" class="form-control category1" name="category1_id" required>
                                        <option selected value="" disabled>-- Chọn danh mục cấp 1 --</option>
                                        @foreach($category1 as $category)
                                            <option value="{{ encryptDecrypt($category->id) }}" {{ isset($product) && $product->category1_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category1_id')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Danh mục cấp 2 </label>
                                    <select id="item" class="form-control category2" name="category2_id">
                                        <option selected value="" disabled>-- Chọn danh mục cấp 2 --</option>
                                        @if(isset($category2))
                                            @foreach($category2 as $cat2)
                                                <option value="{{ encryptDecrypt($cat2->id) }}" {{ $product->category2_id == $cat2->id ? 'selected' : '' }}
                                                >{{ $cat2->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category2_id')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giá sản phẩm (VNĐ) <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control" min="0"  name="price" maxlength="10"
                                           value="{{ isset($product) ? $product->price : old('price')  ? : 0 }}"
                                           placeholder="Giá bán sản phẩm" required>
                                    @error('price')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giá bán KM (VNĐ) - Mặc định không KM</label>
                                    <input type="number" class="form-control" name="price_pro" maxlength="10"
                                           value="{{ isset($product) ? $product->price_pro : old('price_pro') ? : 0 }}"
                                           placeholder="Nhập giá khuyến mãi" min="0" required>
                                    @error('price_pro')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số lượng trong kho <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control" name="quantily"  min="0"
                                           value="{{ isset($product) ? $product->quantily : old('quantily')  ? : 0 }}"
                                           placeholder="Số lượng sản phẩm trong kho" required>
                                    @error('quantily')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số lượng đã bán</label>
                                    <input type="number" class="form-control" name="quantily_sold"
                                           value="{{  isset($product) ? $product->quantily_sold : old('quantily_sold')  ? : 0 }}"
                                           placeholder="Số lượng sản phẩm đã bán" min="0" required>
                                    @error('quantily_sold')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Khối lượng</label>
                                    <input type="text" class="form-control" name="mass"
                                           value="{{ isset($product) ? $product->mass : old('mass')}}"
                                           placeholder="Khối lượng sản phẩm">
                                    @error('mass')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nơi sản xuất</label>
                                    <input type="text" class="form-control" name="made_in"
                                           value="{{ isset($product) ? $product->made_in : old('made_in') ? : 'Việt Nam' }}" placeholder="Nhập Nơi sản xuất" required>
                                    @error('made_in')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label w-100">Ảnh đại diện <span style="color:red;">*</span></label>
                                    <input type="file" id="input_file_img" name="photo" onchange="review_img(event)" {{ isset($product) ? '' : 'required' }}>

                                    <small class="form-text text-muted">Yêu cầu kích thước: 500x600px</small>
                                </div>
                                <div class="review-img">
                                    <img id="review-img" style="    width: 100%; display: block" src="
                                    @if(isset($product))
                                        {{getImage( $product->photo )}}
                                    @else
                                        {{getImage(null)}}
                                    @endif
                                    ">
                                    @error('photo')
                                    <small style="color:red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <br>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn__border btn__blue">
                                        <i class="align-middle" data-feather="check-circle"></i> Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('/_admin/js/page/product.js') }}"></script>
@endpush
