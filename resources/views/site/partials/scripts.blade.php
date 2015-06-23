{!!HTML::script('public/site/js/jquery.min.js') !!}
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
{!! HTML::script('public/site/js/bootstrap.min.js'); !!}

{!! HTML::script('public/beam/js/bootstrap.min.js') !!}
{!! HTML::script('public/beam/js/slick.js') !!}
{!! HTML::script('public/beam/js/main.js') !!}

<!--this scripts are used for page management-->

{!!HTML::script('public/site/js/plugins.js') !!}
{!! HTML::script('public/site/js/transformicon.js') !!}
{!!HTML::script('public/site/js/main.js') !!}
{!!HTML::script('public/site/js/menu/app.js') !!}
{!!HTML::script('public/site/js/menu/main.js') !!}
{!!HTML::script('public/site/js/menu/core.min.js') !!}
{!!HTML::script('public/site/js/menu/metisMenu.min.js') !!}
{!! HTML::script('public/site/js/vendor/modernizr-2.8.3.min.js') !!}
<script>transformicons.add('.tcon')</script>
<script src="http://maps.googleapis.com/maps/api/js"></script>


<!-- Standard Banner-->
{!! HTML::script('public/js/beam/ekko-lightbox.min.js') !!}
{!! HTML::script('public/js/beam/modernizr.js') !!}
{!! HTML::script('public/js/beam/ekko-lightbox.min.js') !!}
{!! HTML::script('public/js/beam/carousel.js') !!}
<!-- Standard Banner-->

 <script>

      $('.thumbnails').slick({
          dots: false,
          infinite: true,
          speed: 300,
          autoplay: false,
          autoplaySpeed: 2000,               
          slidesToShow: 8,
          slidesToScroll: 1

      });
  </script>