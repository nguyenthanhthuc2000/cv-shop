{{--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>--}}

<!-- Jquery -->
<script src="{{ asset('_shop/js/jquery.min.js')}}"></script>
<script src="{{ asset('_shop/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{ asset('_shop/js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{ asset('_shop/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('_shop/js/bootstrap.min.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('_shop/js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('_shop/js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('_shop/js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('_shop/js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{ asset('_shop/js/finalcountdown.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('_shop/js/nicesellect.js')}}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('_shop/js/flex-slider.js')}}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('_shop/js/scrollup.js')}}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('_shop/js/onepage-nav.min.js')}}"></script>
<!-- Easing JS -->
<script src="{{ asset('_shop/js/easing.js')}}"></script>
<!-- Active JS -->
<script src="{{ asset('_shop/js/active.js')}}"></script>
<!-- Slick JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="{{asset('vendor/js/sweetalert2.min.js')}}"></script>
<script src="{{ asset('_shop/js/script.js')}}"></script>


<script type="text/javascript">
{{--(function() {--}}
{{--'use strict'--}}

{{--// Fetch all the forms we want to apply custom Bootstrap validation styles to--}}
{{--var forms = document.querySelectorAll('.needs-validation');--}}
{{--var customField = document.querySelectorAll('.needs-validation [unit]');--}}

{{--// Loop over them and prevent submission--}}
{{--Array.prototype.slice.call(forms)--}}
{{--.forEach(function(form) {--}}
{{--form.addEventListener('submit', function(event) {--}}
{{--if (!form.checkValidity()) {--}}
{{--event.preventDefault()--}}
{{--event.stopPropagation()--}}
{{--}--}}

{{--form.classList.add('was-validated')--}}
{{--}, false)--}}
{{--})--}}
{{--})()--}}

    $(".main-menu li a").filter(function(){
        return this.href == location.href;
    }).parents("li").addClass("active");
</script>
