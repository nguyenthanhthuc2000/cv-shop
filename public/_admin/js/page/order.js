$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('.order_status').change(function() {
    if(confirm('Xác nhận thay đổi trạng thái')){

        let id = $(this).data('id');

        var status = $('.order_status :selected').val();

        $.ajax({
            url: window.route('order.update.status'),
            data: {id:id, status:status},
            method: 'POST',
            success:function(data) {
                if(data.status === 500){
                    alert('Lỗi, thử lại sau!')
                }
            }
        })
    }
})

$('.order_payment_status').change(function() {
    if(confirm('Xác nhận thay đổi trạng thái')){

        let id = $(this).data('id');
        let status = $('.order_payment_status :selected').val();

        $.ajax({
            url: window.route('order.update.payment.status'),
            data: {id:id, status:status},
            method: 'POST',
            success:function(data) {
                if(data.status === 500){
                    alert('Lỗi, thử lại sau!')
                }
            }
        })

    }
})
