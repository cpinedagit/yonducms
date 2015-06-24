<!-- Standard Banner-->
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
{!! HTML::script('public/scheduler/js/bootstrap.min.js') !!}
{!! HTML::script('public/scheduler/js/slick.js') !!}
{!! HTML::script('public/scheduler/js/main.js') !!}
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