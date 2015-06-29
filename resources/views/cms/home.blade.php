<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ env('APP_TITLE') }}</title>
	@include('cms.partials.meta')
	@include('cms.partials.styles') 
	@include('cms.partials.upperscript')
</head>
<body>
		@include('cms.partials.header')
		
		@include('cms.partials.container')
		
		@include('cms.partials.footer')
	
		
	@include('cms.partials.scripts')
	
	@yield('scripts')	<!-- Scripts used for module management -->

</body>
</html>
