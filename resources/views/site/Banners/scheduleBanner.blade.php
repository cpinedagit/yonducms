{!! HTML::style('public/scheduler/css/style.css') !!}
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
                        <h3 class='slider__details__title'>{{ $firstSchedule->title }}</h3>
                        <p class="slider__details__description">
                            {{ $firstSchedule->descriptions }}
                        </p>
                        <a href='#' class='btn btn-red btn-custom-lg' data-toggle='modal' data-target='#myModal'>Watch Video</a>
                    </div>
                    <div class="banner-slider">
				@foreach($firstScheduleImages as $images)
                        <div class ='divImage'>
				    {!! HTML::image($images->media_path,null,['class' => 'scheduleImage']) !!}
                            <div class="mask"></div>				   
                        </div>
				@endforeach
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
                    <div class="scheduleDiv">
				<a class='scheduleId' data-id='{{$schedule->id}}' data-image='{{ $schedule->image }}' href='#' value='{{ $schedule->id }}'>
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
                <center>
			  <video id="video" width="550" controls>
				<source src="{!! URL::to('/') !!}/public/scheduleImages/{{$firstScheduleVideo}}">
			  </video>
		    </center>
            </div>
        </div>
    </div>
</div>
{!! HTML::script('public/scheduler/js/slick.js') !!}
{!! HTML::script('public/scheduler/js/main.js') !!}
<script>
//    var id = $('.scheduleId').attr('data-id');
    //emptying modal;
    $('.modal').on('hidden.bs.modal', function () {
	  $('.modal-body').empty();
    });
    
    setTimeout(function () {
	  $('.slick-active:nth-child(5)').first().click();
    }, 400);

    //this function is trigger when an image schedule is clicked.
    $(document).ready(function () {

	  //click the first schedule

	  //change the images of Main Banner

	  $('.scheduleId').each(function () {
		$(this).on('click', function () {
		    var id = $(this).attr('data-id');
		    $.ajax({
			  type: "get",
			  url: '{!! URL::to("/") !!}' + "/cms/getBannerImages/" + id,
			  dataType: "json",
			  success: (function (data) {
				//console.log(data);
				var origMainBanner = "<div class='col-xs-9 col-sm-9 col-md-9 banner mainBanner'><div class='banner-slider__details'><h3 class='slider__details__title'></h3><p class='slider__details__description'></p><div id ='divVideo'></div></div><div class='banner-slider'><div class ='divImage'><div class='mask'></div></div></div></div>";
				$('#mainBannerDivParent').empty();
				$('#mainBannerDivParent').append(origMainBanner);
				if (data[0][0]['video'] !== "") {
				    $('#divVideo').append("<a href='#' class='btn btn-red btn-custom-lg' data-toggle='modal' data-target='#myModal'>Watch Video</a>");
				}
				$('.slider__details__title').html(data[0][0]['title']);
				$('.slider__details__description').html(data[0][0]['descriptions']);
				$.getScript("../public/scheduler/js/slick.js", function () {
				    slicky();
				});
				$('.modal-body').empty();
				$('.modal-body').removeData();
				if (data[0][0]['video'] != null) {
				    videoPlay(data[0][0]['video']);
				}
				str = "";
				for (x in data[0]) {
				    str += ('<div class ="divImage"><img data-lazy = "{{ URL::to("/") }}/' + data[0][x]['media_path'] + '"></div>');
				    $('.banner-slider').html(str);
				}


			  })
		    });

		});
	  });
    });

    //this function is ofr appending video for video modal.
    function videoPlay(videofile) {	    
//	  
//	  $('.modal-body').append('<center><video id="video" width="750" controls><source src="{!! URL::to("/") !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');
//
//	  $('.modal').on('shown.bs.modal', function () {
//		$('.modal-body').empty();
//		$('.modal-body').removeData();
//		if (videofile) {
//		    $('.modal-body').append('<center><video id="video" width="550" controls autoplay><source src="{!! URL::to("/") !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');
//		}
//	  });
    }
    
    

    window.onload = slicky();
    
    $('.banner-slider').on('afterChange', function () {
	   if (item_length-2 === window.currentSlide) {
		    setTimeout(function () {
			  $('.slick-next').click();
			  $('.schedule__list--active').next().addClass('schedule__list--active');
			  $('.schedule__list--active').prev().removeClass('schedule__list--active');
			  $('.schedule__list--active .scheduleId:first-child').click();				    
		    },1000);
		}
	  $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		 currentSlide = $('.banner-slider').slick('slickCurrentSlide');
	  }); 

    });

    function slicky() {
	  item_length = $('.banner-slider > div').length;
	  var slider = $('.banner-slider').slick({
		autoplay: true,
		dots: true,
		infinite: true,
		autoplaySpeed: 1000,
		pauseOnHover: false
	  });
	  


	  $('.schedule__list').slick({
		vertical: true,
		dots: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		pauseOnHover: false

	  });

	  $('.slider2.slick-vertical .slick-slide.slick-active').first().addClass('custom-slick-active');

    }
</script>