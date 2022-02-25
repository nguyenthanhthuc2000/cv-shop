$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
$('.category1').change(function() {
    let id = $(this).val();
    $.ajax({
        url: window.route('category.get.category'),
        data: {id:id},
        method: 'POST',
        success:function(data) {
             $('.category2').html(data)
        }
    })
})

$('.btn-status-product').click(function() {
    let id = $(this).data('id');
    let status = 0;
    if($(this).prop('checked') ? status = 1 : status = 0);
    $.ajax({
        url: 'cap-nhat-trang-thai-san-pham',
        data: {id:id, status:status},
        method: 'POST',
        success:function(data) {
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})
$('.btn-highlights-product').click(function() {
    let id = $(this).data('id');
    let highlights = 0;
    if($(this).prop('checked') ? highlights = 1 : highlights = 0);
    $.ajax({
        url: 'cap-nhat-highlights-san-pham',
        data: {id:id, highlights:highlights},
        method: 'POST',
        success:function(data) {
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})

$('.btn-destroy-product').click(function(e) {
    e.preventDefault();
    let url = $(this).attr('href');
    Swal.fire({
      title: 'Xác nhận  xóa?',
      text: "Không thể khôi phục sau khi xóa!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa!',
      cancelButtonText: 'Đóng',
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = url;
      }
    })
})

$('input[type=number]').on('keypress', function(event) {
     let charCode =(event.which) ? event.which : event.keyCode
    if(charCode >31 &&(charCode <48 || charCode >57))
        return false;
    return true;
})
