
function isNumberKey(event){
    var charCode =(event.which) ? event.which : event.keyCode
    if(charCode >31 &&(charCode <48 || charCode >57))
        return false;
    return true;
}

 $('.slick-bai-viet').slick({
         slidesToShow: 3,
         slidesToScroll: 1,
         dots: false,
         arrows: true,
         autoplayspeed: 2000,
         autoplay:true,
         centerPadding: '60px',
         infiniite: true,
         responsive: [
 	    {
 	      breakpoint: 1024,
 	      settings: {
 	        slidesToShow: 2,
 	        slidesToScroll: 1,
 	        infinite: true,
 	        dots: true
 	      }
 	    },
 	    {
 	      breakpoint: 767,
 	      settings: {
 	        slidesToShow: 2,
 	        slidesToScroll: 1
 	      }
 	    },
 	    {
 	      breakpoint: 480,
 	      settings: {
 	        slidesToShow: 1,
 	        slidesToScroll: 1
 	      }
 	    }
 	  ]
 });

$('.image-detail').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});

$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

function getCartAjax(){
    $.ajax({
        url: '/load-cart-ajax',
        method:'POST',
        success:function(data){
            if(data.status === 200){

              $('.shopping-list').html(data.output);
              $('.total-count').html(data.totalItem);
              $('.total-amount-cart-ajax').html(data.totalCart);

            }else if(data.status === 201){

            }
        }
    })
}

getCartAjax();
$('.btn-add-cart').click(function(){
    let id = $(this).data('id');
    let qty = $('.val-qty-'+id).val();

     $.ajax({
        url: window.route('cart.store'),
        method:'POST',
        data:{id:id, qty:qty},
        success:function(data){
            if(data.status == 200){
                getCartAjax();
                Swal.fire(
                  'Thêm giỏ hàng',
                  'Thành công!',
                  'success'
                )
            }else if(data.status == 501){
                Swal.fire(
                  'Thêm giỏ hàng',
                  'Sản phẩm đã hết hàng!',
                  'error'
                )
            }else if(data.status == 502){
                 Swal.fire(
                   'Thêm giỏ hàng',
                   'Không tìm thấy sản phẩm!',
                   'error'
                 )
             }
            else if(data.status == 503){
                 Swal.fire(
                   'Thêm giỏ hàng',
                   'Số lượng trong kho không đủ!',
                   'error'
                 )
             }
        }
    })
})

$('.btn-add-cart-list').click(function(){
    let id = $(this).data('id');
    let qty = 1;

     $.ajax({
        url: window.route('cart.store'),
        method:'POST',
        data:{id:id, qty:qty},
        success:function(data){
            if(data.status == 200){
                getCartAjax();
                Swal.fire(
                  'Thêm giỏ hàng',
                  'Thành công!',
                  'success'
                )
            }else if(data.status == 501){
                Swal.fire(
                  'Thêm giỏ hàng',
                  'Sản phẩm đã hết hàng!',
                  'error'
                )
            }else if(data.status == 502){
                 Swal.fire(
                   'Thêm giỏ hàng',
                   'Không tìm thấy sản phẩm!',
                   'error'
                 )
             }
            else if(data.status == 503){
                 Swal.fire(
                   'Thêm giỏ hàng',
                   'Số lượng trong kho không đủ!',
                   'error'
                 )
             }
        }
    })
})
