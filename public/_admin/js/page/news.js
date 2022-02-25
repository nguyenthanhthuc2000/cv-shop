$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('.btn-status-news').click(function() {
    let id = $(this).data('id');
    let status = 0;
    if($(this).prop('checked') ? status = 1 : status = 0);
    $.ajax({
        url: 'cap-nhat-trang-thai-tin-tuc',
        data: {id:id, status:status},
        method: 'POST',
        success:function(data) {
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})

$('.btn-destroy-news').click(function(e) {
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
