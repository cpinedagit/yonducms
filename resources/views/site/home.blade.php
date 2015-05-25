<!doctype html>
<html lang="en">
    <head>
        <title>{{ $APP_TITLE }}</title>
        @include('site.partials.meta')
        @include('site.partials.styles')
        @include('site.partials.scripts')
        <link rel="icon" type="image/png" href="{{ URL().'/public/favicon.ico' }}">
    </head>
    <body>          
        @include('site.partials.menu');
        @yield('sitecontent');
        @include('site.partials.footer');
        <!--test-->
    </body>
</html>
