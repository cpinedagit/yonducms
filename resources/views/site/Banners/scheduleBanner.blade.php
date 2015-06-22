{!! HTML::style('public/site/css/beam/css/style.css') !!}
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id))
		return;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1480129802245390";
	  fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<main class="main">
    <div class="container">
        <div class="row">
            <div id="mainBannerDivParent">
                <div class="col-xs-9 col-sm-9 col-md-9 banner mainBanner">
                    <div class="banner-slider__details">
                        <h3 class='slider__details__title'>big love</h3>
                        <p class="slider__details__description">
                            En un lugar de la Mancha, de cuyo nombre no quiero acordarme, no ha mucho tiempo que vivia un hidalgo de los de lanza
                        </p>
                        <a href="#" class="btn btn-red btn-custom-lg">Watch Video</a>
                    </div>
                    <div class="banner-slider">
                        <div class ='divImage'>
				    <img src="../public/site/css/beam/images/lg-thumbnails/big-love/img-1.jpg" alt="">
                            <div class="mask"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--vertical slider-->
            <aside class="col-xs-3 col-sm-3 col-md-3">
                <h4 class="schedule__title">
                    schedule for <span class="red">today</span>
                </h4>
                <div class="schedule__list">
                    @foreach($schedules as $schedule)
                    <div>
				<a class='scheduleId' data-id='{{$schedule->id}}' data-image='{{ $schedule->image }}'>
				    <div class="schedule__list--image">
					  {!! HTML::image('public/scheduleImages/'.$schedule->image) !!}
				    </div>
				    <div class="schedule__list--details">
					  <div class="time">
						<?php
						date_default_timezone_set('Asia/Manila');
						$sched = new DateTime($schedule->schedule);
						echo $sched->format('H:i a');
						?>
					  </div>
					  <div>
						{{ $schedule->title }}<br>
					  </div>
				    </div>
				</a> 
                    </div>
                    @endforeach
                </div>
            </aside>
            <!--vertical slider-->
        </div>
    </div>
</main>

<!--modal for Main Banner Video link-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!--body-->
            </div>
        </div>
    </div>
</div>
{!! HTML::script('public/site/js/beam/js/slick.js') !!}
{!! HTML::script('public/site/js/beam/js/main.js') !!}
<script>
    //initialize slick banner
    slicky();

    //emptying modal;
    $('.modal').on('hidden.bs.modal', function () {
	  $('.modal-body').empty();
    });

    //this function is trigger when an image schedule is clicked.
    $(document).ready(function () {
	  $('.scheduleId').on('click', function () {
		var id = $(this).attr('data-id');
		$.ajax({
		    type: "get",
		    url: '{!! URL::to("/") !!}' + "/cms/getBannerImages/" + id,
		    dataType: "json",
		    success: (function (data) {
			  var origMainBanner = "<div class='col-xs-9 col-sm-9 col-md-9 banner mainBanner'><div class='banner-slider__details'><h3 class='slider__details__title'></h3><p class='slider__details__description'></p><div id ='divVideo'></div></div><div class='banner-slider'><div class ='divImage'><div class='mask'></div></div></div></div>";
			  $('#mainBannerDivParent').empty();
			  $('#mainBannerDivParent').append(origMainBanner);
			  if (data[0][0]['video'] !== "") {
				$('#divVideo').append("<a href='#' class='btn btn-red btn-custom-lg' data-toggle='modal' data-target='#myModal'>Watch Video</a>");
			  }
			  $('.slider__details__title').html(data[0][0]['title']);
			  $('.slider__details__description').html(data[0][0]['descriptions']);
			  $.getScript("../public/site/js/beam/js/slick.js", function () {
				slicky();
			  });
			  $('.modal-body').empty();
			  $('.modal-body').removeData();
			  videoPlay(data[0][0]['video']);
			  str = "";
			  for (x in data[0]) {
				str += ('<div class ="divImage">{!! HTML::image("' + data[0][x]['media_path'] + '") !!}</div>');
				$('.banner-slider').html(str);
			  }


		    })
		});

	  });

    });

    //this function is ofr appending video for video modal.
    function videoPlay(videofile) {

	  $('.modal-body').append('<center><video id="video" width="550" controls><source src="{!! URL::to("/") !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');

	  $('.modal').on('shown.bs.modal', function () {
		$('.modal-body').empty();
		$('.modal-body').removeData();
		$('.modal-body').append('<center><video id="video" width="550" controls autoplay><source src="{!! URL::to("/") !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');
	  });
    }

    function slicky() {
	  $('.banner-slider').slick({
		dots: true,
		infinite: true,
		speed: 300,
		autoplay: true,
		autoplaySpeed: 4000
	  });
	  $('.schedule__list').slick({
		vertical: true,
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 10000

	  });

	  $('.slider2.slick-vertical .slick-slide.slick-active').first().addClass('custom-slick-active');

    }
    
    setTimeout(function(){
	  alert("Hello"); 
    
    }, 3000);

</script>