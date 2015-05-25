<!doctype html>
<html lang="en">
<head>
	<title>{{ env('APP_TITLE') }}</title>
	@include('cms.partials.meta')
	@include('cms.partials.styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		{!! HTML::script('public/ckeditor/ckeditor.js'); !!}
	
</head>
<body>
		@include('cms.partials.header')
		@section('title')
			<h2>Dashboard</h2>
		@stop
		@include('cms.partials.container')

		<!-- Include News Feeds -->
		@if(isset($data['news_feeds']))
			@include('cms.news_feeds.index')
		@endif
		<!-- Include News Feeds -->
		
		@include('cms.partials.footer')
	
		
	@include('cms.partials.scripts')
</body>
</html>
