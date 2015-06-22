<!doctype html>
<html lang="en">
<head>
	<title>{{ env('APP_TITLE') }}</title>
	@include('cms.partials.meta')
	@include('cms.partials.styles')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	{!! HTML::script('public/ckeditor/ckeditor.js'); !!}
        {!! HTML::script('public/js/beam/bootstrap.min.js'); !!}
        {!! HTML::script('public/js/beam/modernizr.js'); !!}
        <!--Scheduler-->
{!! HTML::script('public/slide/js/jssor.js') !!} 
{!! HTML::script('public/slide/js/jssor.slider.js') !!} 
{!! HTML::script('public/vertical_slider/js/sliderScheduler.js') !!} 
<!--Scheduler-->
</head>
<body>
		@include('cms.partials.header')
		
		@include('cms.partials.container')
		
		@include('cms.partials.footer')
	
		
	@include('cms.partials.scripts')
	
	@yield('scripts')	<!-- Scripts used for module management -->

</body>
</html>
