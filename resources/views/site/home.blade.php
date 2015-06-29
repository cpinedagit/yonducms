<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>{{ $APP_TITLE }}</title>
        @include('site.partials.meta')
        @include('site.partials.styles')
	    {!! HTML::script('public/js/jquery.js') !!}
        {!! HTML::script('public/beam/js/vendor/modernizr-2.8.3.min.js') !!}
    </head>
    <body id="nav-{!! menuLayout() !!}" class="home adjustment-div">          
        @include('site.partials.fb')
        @include('site.partials.loader')
        @include('site.partials.menu')
        @yield('sitecontent')
        @include('site.partials.footer')
        <!--test-->
    </body>
    @include('site.partials.scripts')

</html>
