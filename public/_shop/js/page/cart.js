$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
loadCartTableAjax();

function loadCartTableAjax(){
    $.ajax({
        url: window.route('cart.table.load.ajax'),
        method:'POST',
        success:function(data){
            if(data.status === 200){

                $('.cart-main-ajax').html(data.output)

            }else if(data.status === 201){

            }
        }
    })
}

$(document).on("click",".delete-product-cart",function() {
    confirm('Xác nhận xóa')
})
