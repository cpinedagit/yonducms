<!doctype html>
<html lang="en">
    <head>
        <title>{{ $APP_TITLE }}</title>
        @include('site.partials.meta')
        @include('site.partials.styles')
    </head>
    <body id="nav-right">          
        @include('site.partials.menu');
        @yield('sitecontent');
        @include('site.partials.footer');
        <!--test-->
    </body>
    @include('site.partials.scripts')

</html>
