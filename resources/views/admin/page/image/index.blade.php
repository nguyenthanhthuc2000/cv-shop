@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        @include('admin.layout.alert')
        <div class="title-form d-flex mb-3" style="justify-content: space-between">
            <h3 class=" mb-0">Danh sách hình ảnh</h3>
            <a href="{{ route('image.create', $type) }}" class="btn__border btn__green"><i class="fas fa-plus-circle"></i> Thêm</a>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card flex-fill">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th style="min-width: 200px;">Liên kết</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-right">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($images->count() > 0)
                                @foreach($images as $image)
                                    <tr>
                                        <td><img style="width: 100px; display: block; object-fit: cover;"
                                                 src="{{ getImage($image->photo, 'image') }}" alt="{{ $image->photo }}">
                                        </td>
                                        <td><a href="">{{ $image->photo_desc }}</a></td>
                                        <td><a href="">{{ $image->link }}</a></td>
                                        <td class="text-center">
                                            <label class="switch">
                                                <input type="checkbox" class="btn-status-image"
                                                       data-id="{{ encryptDecrypt($image->id) }}" {{ $image->status == 0 ? '' : 'checked' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('image.edit', encryptDecrypt($image->id)) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a href="{{ route('image.destroy', encryptDecrypt($image->id)) }}" class="btn-destroy-image"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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
                            {{ $images->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('/_admin/js/page/image.js') }}"></script>
@endpush
