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
        @include('site.partials.loader')
        
        <main class="main">
         <div class="container">
            <div class="row">
               <div class="construction-container error-404-holder">
                
                    
                    <img src="{!! URL() . '/public/beam/images/Error404.png' !!}" class="img-responsive" alt="beam-tv">
                    <h3 class='oops'>OOPS!</h3>
                    <p>The requested URL /sample/sample.php was not found on our server.</p>
                    <p>Go back to <a href="{!! URL().'/site' !!}" class='link-back'>BEAM's home page</a></p>
                    
                   
               </div>
           </div>
         </div>
         
       </main>

    </body>
    @include('site.partials.scripts')

</html>
