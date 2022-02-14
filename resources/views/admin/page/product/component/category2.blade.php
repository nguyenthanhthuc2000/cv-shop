<option selected="" value="" disabled>-- Chọn danh mục cấp 2 --</option>
@if($category2->count() > 0)
    @foreach($category2 as $cat2)
        <option value="{{ encryptDecrypt($cat2->id) }}">{{ $cat2->name }}</option>
    @endforeach
@else
    <option value="" disabled>Không có dữ liệu</option>
@endif
