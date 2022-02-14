@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        @include('admin.layout.alert')
        <form action="{{ route($route, isset($news) ? encryptDecrypt($news->id) : '') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="title-form d-flex mb-3" style="justify-content: space-between">
                <h2 class="h3">Thông tin bài viết</h2>
                <button type="submit" class="btn btn-primary btn__border btn__blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Lưu
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label">Tên bài viết <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên bài viết" value="{{ isset($news) ? $news->name : '' }}" required="">
                                @error('name')
                                <small style="color:red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nội dung <span style="color:red;">*</span></label>
                                <textarea class="form-control" placeholder="Textarea" id="ckeditor" name="contents" required>{{ isset($news) ? $news->content : '' }}</textarea>
                                @error('contents')
                                <small style="color:red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label w-100">Ảnh đại diện <span style="color:red;">*</span></label>
                                <input type="file" id="input_file_img" name="photo" onchange="review_img(event)" {{ $route == 'news.create' ? 'required' : '' }}>

                                <small class="form-text text-muted">Yêu cầu kích thước: 500x600px</small>
                            </div>
                            <div class="review-img">
                                <img id="review-img" style="    width: 100%; display: block" src="{{ isset($news) ?  getImageCrawl($news->photo, $news->crawl) : getImage(null) }}">
                            </div>
                            @error('photo')
                            <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="{{ asset('/_admin/js/page/news.js') }}"></script>
@endpush
