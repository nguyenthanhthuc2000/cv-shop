$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('.btn-status-voucher').click(function() {
    let id = $(this).data('id');
    let status = 0;
    if($(this).prop('checked') ? status = 1 : status = 0);
    $.ajax({
        url: 'cap-nhat-trang-thai-voucher',
        data: {id:id, status:status},
        method: 'POST',
        success:function(data) {
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})
$('.btn-destroy-voucher').click(function(e) {
    e.preventDefault();
    let url = $(this).attr('href');
    Swal.fire({
      title: 'Xác nhận xóa?',
      text: "Không thể khôi phục!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa!',
      cancelButtonText: 'Hủy!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url
      }
    })
})
