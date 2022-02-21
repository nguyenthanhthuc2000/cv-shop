$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

loadCartTotalAjax();
loadCartTableAjax();

function loadCartTotalAjax(){

    $.ajax({
        url: window.route('cart.total.load.ajax'),
        method:'POST',
        success:function(data){
            if(data.status === 200){

                $('.load-total-cart-ajax').html(data.output)

            }else if(data.status === 201){

                alert('Lỗi')
            }
        }
    })

}



function loadCartTableAjax(){
    $.ajax({
        url: window.route('cart.table.load.ajax'),
        method:'POST',
        success:function(data){
            if(data.status === 200){

                $('.cart-main-ajax').html(data.output)

            }else if(data.status === 201){

                alert('Lỗi')
            }
        }
    })
}

$(document).on("click",".btn-add-voucher",function() {
    let voucher = document.getElementById('voucher').value;
    if(voucher == ''){
        alert('Vui lòng nhập mã giảm giá')
    }
     $.ajax({
        url: window.route('voucher.add'),
        method:'POST',
        data: {voucher:voucher},
        success:function(data){
            if(data.status === 200){
                document.getElementById('voucher').value = ''
                getCartAjax();
                loadCartTableAjax();
                loadCartTotalAjax();

            }else if(data.status === 501){

                alert(data.message)
            }
        }
    })
})


$(document).on("click",".delete-product-cart",function() {
    let id = $(this).data('id');
    if (confirm("Xác nhận xóa!") == true) {
//    alert(id);

         $.ajax({
            url: window.route('cart.delete.product'),
            method:'POST',
            data: {id:id},
            success:function(data){
                if(data.status === 200){

                     getCartAjax();
                    loadCartTableAjax();
                loadCartTotalAjax();

                }else if(data.status === 201){

                alert('Lỗi')
                }
            }
        })

    }
})


$(document).on("change", ".pro-cart-qty", function(){
    var qty = $(this).val();
    var id = $(this).data('id');
     $.ajax({
        url: window.route('update.qty.product'),
        method:'POST',
        data:{id:id, qty:qty},
        success:function(data){
            if(data.status === 200){
                getCartAjax();
                loadCartTableAjax();
                loadCartTotalAjax();
            }
            else if(data.status === 501){
                alert('Lỗi')
                loadCartTableAjax();
            }
        }
    })
})
