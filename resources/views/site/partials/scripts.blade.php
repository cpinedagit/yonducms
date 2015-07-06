<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
{!! HTML::script('public/beam/js/loader.js') !!}
{!! HTML::script('public/beam/js/bootstrap.min.js') !!}

{!! HTML::script('public/beam/js/jPages.min.js') !!}
<script src="http://maps.googleapis.com/maps/api/js"></script>
{!! HTML::script('public/beam/js/slick.js') !!}
{!! HTML::script('public/beam/js/transformicon.js') !!}
{!! HTML::script('public/beam/js/jquery.dotdotdot.js') !!}
{!! HTML::script('public/beam/js/main.js') !!}


 <script>
    transformicons.add('.tcon');
      $('.banner-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 4000
      });
       $('.schedule__list').slick({
            vertical:true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 10000,
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  vertical:false
                }
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  vertical:false
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  vertical:false
                }
              }
             ]

        });
       $('.thumbnails').slick({
                dots: false,
                infinite: true,
                speed: 300,
                autoplay: false,
                autoplaySpeed: 2000,               
                slidesToShow: 8,
                slidesToScroll: 1
               
            });
       $(function() {
            $(".insight").dotdotdot({
                ellipsis  : '... ', 
                wrap    : 'word',   
                fallbackToLetter: true,
                after   : null, 
                watch   : false,  
                height    : null,   
                tolerance : 0, 
                lastCharacter : {
                    remove    : [ ' ', ',', ';', '.', '!', '?' ],
                    noEllipsis  : []
                }
            });
           
            $("div.holder").jPages({
                containerID: "itemContainer",
                perPage:2,
                previous: "span.fa-prev",
                next: "span.fa-next"
            });
            $(window).resize(function(){
                $(".insight").dotdotdot({
                    ellipsis  : '... ', 
                    wrap    : 'word',   
                    fallbackToLetter: true,
                    after   : null, 
                    watch   : false,  
                    height    : null,   
                    tolerance : 0, 
                    lastCharacter : {
                        remove    : [ ' ', ',', ';', '.', '!', '?' ],
                        noEllipsis  : []
                    }
                });
            })           
        });
       $(function() {
           var locations = [
              ['3/F The Globe Plaza',14.571711, 121.049838, 1],
              ['Palos Verdes Subdivision',14.607357, 121.157430, 2]
            ];
            var infowindow = new google.maps.InfoWindow();
            var marker=[];
            var map=[];
            var i;
            for (i = 0; i < locations.length; i++) {  

                map[i]= new google.maps.Map(document.getElementById('googleMap'+(i+1)), {
                  zoom: 17,
                  scrollwheel: false,
                  center: new google.maps.LatLng(locations[i][1], locations[i][2]),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                marker[i] = new google.maps.Marker({
                  position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                  map: map[i]
                });

                google.maps.event.addListener(marker[i], 'click', (function(marker, i) {
                  return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map[i], marker[i]);
                  }
                })(marker, i));
            } 
        });
  </script>

<!-- Standard Banner-->
{!! HTML::script('public/js/beam/ekko-lightbox.min.js') !!}
{!! HTML::script('public/js/beam/modernizr.js') !!}
{!! HTML::script('public/js/beam/carousel.js') !!}
<!-- Standard Banner-->