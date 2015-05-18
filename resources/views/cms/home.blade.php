<!doctype html>
<html lang="en">
<head>
	<title>{{ $APP_TITLE }}</title>
	@include('cms.partials.meta')
	@include('cms.partials.styles')
	<script type="text/javascript" src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>

	{!! HTML::script('public/js/plugins.js') !!}
	{!! HTML::script('public/js/DataTables-1.10.3/media/js/jquery.dataTables.min.js') !!}
	{!! HTML::script('public/js/dataTables.js') !!}
	{!! HTML::script('public/js/bootstrap.min.js'); !!}
	{!! HTML::script('public/js/parsley/parsley.js'); !!}
	{!! HTML::script('public/js/parsley/parsley.remote.js'); !!}
	{!! HTML::script('public/ckeditor/ckeditor.js'); !!}
	
</head>
<body>
		@include('cms.partials.header')
		@include('cms.partials.container')
		@include('cms.partials.footer')
	
	<!--test-->
		
@include('cms.partials.scripts')
</body>
</html>
