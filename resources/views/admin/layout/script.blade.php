
<script src="{{ asset('_admin/js/vendor.js') }}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/js/sweetalert2.min.js')}}"></script>
<script src="{{ asset('_admin/js/app.js') }}"></script>
<script type="text/javascript">
     CKEDITOR.replace('ckeditor');
     CKEDITOR.replace('ckeditor_desc');

    $(".main-menu li a").filter(function(){
        return this.href == location.href;
    }).parents("li").addClass("active");
</script>
@stack('js')
<script>
    let review_img = function(event){
        let img = document.getElementById('review-img');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.onload = function(){
            URL.revokeObjectURL(img.src);
        }
    }
    $(document).ready(function(){
        $('#review-img').click(function(){
            $('#input_file_img').click();
        })
    })

    $(function() {
        $('#datetimepicker-dashboard').datetimepicker({
            inline: true,
            sideBySide: false,
            format: 'L'
        });
    });
</script>
