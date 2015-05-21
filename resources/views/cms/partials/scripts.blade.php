<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>

	
	{!! HTML::script('public/js/jquery.dataTables.min.js') !!}
	{!! HTML::script('public/js/bootstrap.min.js'); !!}
	{!! HTML::script('public/ckeditor/ckeditor.js'); !!}
	{!! HTML::script('public/ckeditor/adapters/jquery.js'); !!}
	{!! HTML::script('public/js/jquery-ui.min.js'); !!}

	{!! HTML::script('public/js/plugins.js') !!}
	{!! HTML::script('public/js/parsley/parsley.js'); !!}
	{!! HTML::script('public/js/parsley/parsley.remote.js'); !!}
	{!! HTML::script('public/js/dataTables.js') !!}
	{!! HTML::script('public/js/vendor/modernizr-2.8.3.min.js'); !!}
	<script>
	var formats = "{{ env('APP_MEDIA_FORMATS') }}";
  	formats = formats.split(',');
  	var default_size = "{{ env('APP_MEDIA_MAX_FILE_SIZE') }}";
  	</script>
	{!! HTML::script('public/js/main.js') !!}
	{!! HTML::script('public/js/menu_cms/jquery.nestable.js') !!}
	{!! HTML::script('public/js/menu_cms/menu_app.js') !!}

<script>
	$(document).ready(function() {
		$('.datepicker').datepicker();
	})
</script>	