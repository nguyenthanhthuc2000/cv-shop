
<script src="{{ asset('_admin/js/vendor.js') }}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/js/sweetalert2.min.js')}}"></script>
<script src="{{ asset('_admin/js/app.js') }}"></script>
@stack('js')
<script>
		$(function() {
			$('#datetimepicker-dashboard').datetimepicker({
				inline: true,
				sideBySide: false,
				format: 'L'
			});
		});
	</script>
