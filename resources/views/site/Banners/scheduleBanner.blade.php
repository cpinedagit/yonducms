@if($scheduleCount == 0)
<div class="alert alert-warning" role="alert">no schedule yet</div>
@else
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
<!--Scheduler-->
{!! HTML::script('public/slide/js/jssor.js') !!} 
{!! HTML::script('public/slide/js/jssor.slider.js') !!} 
{!! HTML::script('public/vertical_slider/js/sliderScheduler.js') !!} 
{!! HTML::style('public/scheduler/css/style.css') !!}
<!--Scheduler-->
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
                        <!--<a href='#' class='btn btn-red btn-custom-lg' data-toggle='modal' data-target='#myModal'>Watch Video</a>-->
				<a href="#" data-toggle="modal" data-target="#modal-movie" class="btn btn-red btn-custom-lg">Watch Video</a>
				<div class="modal-wrapper" id="modal-movie">
				    <div class="modal-container">
					  <i class="fa fa-times-circle modal-close fa-2x" data-dismiss="modal"></i>
					  <div class="modal-slider">
						<video width="800" height="500" id='video-modal' controls>
						  <source src="{!! URL::to('/') !!}/public/scheduleImages/{{$firstScheduleVideo}}">
						Your browser does not support the video tag.
						</video>
					  </div>
				    </div>
				</div>
                    </div>
                    <div class="banner-slider">
				@foreach($firstScheduleImages as $images)
				@if($images->media_path == null)
				<span id ='nextSlide'></span>
				@else
				<div class ='divImage'>
				    {!! HTML::image($images->media_path,null,['class' => 'scheduleImage']) !!}
                            <div class="mask"></div>				   
                        </div>
				@endif
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
                    <div class="scheduleDiv{!!$schedule->id!!}">
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
<!--<div class="modal fade modal-wrapper" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
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
</div>-->

{!! HTML::script('public/scheduler/js/slick.js') !!}
{!! HTML::script('public/scheduler/js/main.js') !!}
<script>
window.onload = slicky();
    //emptying modal;
    $('.modal').on('hidden.bs.modal', function () {
	  $('video').trigger('pause');	  
    });
    
    $('.modal').on('shown.bs.modal', function () {
	 status = 1;
	 console.log(status);
    });
    //click the first schedule
    setTimeout(function () {
	  $('.scheduleDiv1.slick-active').addClass('schedule__list--active');
//	  $('.schedule__list--active .scheduleId:first-child').click();
    }, 400);
    $(document).ready(function () {
	  status = 0;
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
				$.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
				    slicky2();
				});
				$('.modal-body').empty();
				$('.modal-body').removeData();
				if (data[0][0]['video'] != null) {
				    videoPlay(data[0][0]['video']);
				}
				str = "";
				for (x in data[0]) {
				    if(data[0][x]['media_path'] != null){
					  str += ('<div class ="divImage"><img data-lazy = "{{ URL::to("/") }}/' + data[0][x]['media_path'] + '"></div>');
					  $('.banner-slider').html(str);
				    }
				}
			  })
		    });
		});
	  }); 
    });

    //this function is ofr appending video for video modal.
    function videoPlay(videofile) {	    
	  if(videofile !== ''){
		$('.modal-body').append('<center><video id="video" width="569px" controls><source src="{!! URL::to("/") !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');
	  }
    }
    //first initialized slicky
    function slicky() {
	  currentsLide = 1;
	  item_length = $('.banner-slider > div').length;
	  var slider = $('.banner-slider').slick({
		autoplay: true,
		dots: true,
		infinite: true,
		autoplaySpeed: 4000,
		pauseOnHover: false
	  });
	  $('.btn-custom-lg').on('click', function(){
		$.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		    $('.banner-slider').slick('slickPause');
		}); 		
	  });
	  
	  $('.close').on('click', function(){
		 $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		     $('.banner-slider').slick('slickPlay');
		 }); 
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
    
        $('.banner-slider').on('afterChange', function () {
	  currentsLide++;
	  var scheduleCount = {{ $scheduleCount }};
	  var scheduleIndeces = $('.schedule__list--active').attr('data-slick-index'); 
//	  console.log(item_length +' = '+currentsLide);
//	  console.log(scheduleCount-1 +' '+ scheduleIndeces)
	//  alert(status);
	  if(status == 0){
		if(item_length === currentsLide){
		    if(scheduleCount-1 == scheduleIndeces){
		    setTimeout(function () {
			  setTimeout(function () {
				if(status == 0){
				    $('.slick-next').click();
				    $('.schedule__list--active').removeClass('schedule__list--active'); 
				    $('.scheduleDiv1.slick-active').addClass('schedule__list--active');					  
				    $('.schedule__list--active .scheduleId:first-child').trigger('click');
				}
			  });		    
		    },4000);
		    }else{
			  setTimeout(function () {
				if(status == 0){
				    currentsLide--;
				    $('.slick-next').click();
				    $('.schedule__list--active').next().addClass('schedule__list--active');
				    $('.schedule__list--active').prev().removeClass('schedule__list--active');
				    $('.schedule__list--active .scheduleId:first-child').click();
				}
			  },4000);
		    }
		}
	  }
    });
//    re-initialize slicky when a schedule banner is being clicked
    function slicky2() {
	  currentsLide = 0;
	  item_length = $('.banner-slider > div').length;
	  var slider = $('.banner-slider').slick({
		autoplay: true,
		dots: true,
		infinite: true,
		autoplaySpeed: 4000,
		pauseOnHover: false
	  });
	  $('.btn-custom-lg').on('click', function(){
		$.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		    $('.banner-slider').slick('slickPause');
		}); 		
	  });
	  
	  $('.close').on('click', function(){
		 $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		     $('.banner-slider').slick('slickPlay');
		 }); 
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

    $('.btn-custom-lg').on('click', function(){
	  $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		$('.banner-slider').slick('slickPause');		
	  }); 		
    });

    $('.close').on('click', function(){
	   status = 0;
	   if(item_length == 1){
		setTimeout(function () {
		    $('.slick-next').click();
		    $('.schedule__list--active').next().addClass('schedule__list--active');
		    $('.schedule__list--active').prev().removeClass('schedule__list--active');
		    $('.schedule__list--active .scheduleId:first-child').click();
		},4000);
	   }else{
		$.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
		    $('.banner-slider').slick('slickPlay');
		    console.log(status);
		});
	   }
    });
</script>
@endif