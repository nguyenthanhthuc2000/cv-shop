@extends('admin.layout.master_layout')
@section('content')

    <div class="container-fluid p-0">
        @include('admin.layout.alert')
        <div class="title-form d-flex mb-3" style="justify-content: space-between">
            <h3 class=" mb-0">Danh mục cấp {{request()->route()->getName() == 'category1.index' ? '1' : '2' }}</h3>
            <a href="{{ route('category.create', encryptDecrypt($level)) }}" class="btn__border btn__green"><i class="fas fa-plus-circle"></i> Thêm</a>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card flex-fill">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-right">Thao tác</th>
                        </tr>
                        </thead>
                            <tbody>
                                @if($categorys->count() > 0)
                                    @foreach($categorys as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->categoryParent->name}}</td>
                                            <td class="text-center">
                                                <label class="switch">
                                                    <input type="checkbox" class="btn-status-category" data-id="{{ encryptDecrypt($category->id) }}" {{ $category->status == 0 ? '' : 'checked' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('category.edit', encryptDecrypt($category->id)) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                <a href="{{ route('category.destroy', encryptDecrypt($category->id)) }}" class="btn-destroy-category"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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
                            {{ $categorys->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
<script src="{{ asset('/_admin/js/page/category.js') }}"></script>
@endpush
