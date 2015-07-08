@extends('cms.home')
@section('content')
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
            <div class="col-xs-9 col-sm-9 col-md-9 loader-container-slider show">
                <div class="loader" style="margin-top:200px;>
                    <span class="loadtext">loading</span>
                    <div class="dot dot1"></div>
                    <div class="dot dot2"></div>
                    <div class="dot dot3"></div>
                    <div class="dot dot4"></div>
                </div>
            </div>
            <div id="mainBannerDivParent">
                <div class="col-xs-9 col-sm-9 col-md-9 banner mainBanner">
                    <div class="banner-slider__details">
                        <h3 class='slider__details__title'>{{ $firstSchedule->title }}</h3>
                        <p class="slider__details__description">
                            {{ $firstSchedule->descriptions }}
                        </p>
                        <!--<a href='#' class='btn btn-red btn-custom-lg' data-toggle='modal' data-target='#myModal'>Watch Video</a>-->
                        <a href="#" onclick="slickPause()" data-toggle="modal" data-target="#modal-movie" class="btn btn-red btn-custom-lg">Watch Video</a>
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
<div class="modal modal-wrapper wakoko" id="modal-movie" aria-hidden="true" role="dialog" data-backdrop="static">
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
{!! HTML::script('public/scheduler/js/slick.js') !!}
{!! HTML::script('public/scheduler/js/main.js') !!}
<script>
    $('.modal-close').on('.modal-close', function () {
        $('video').trigger('pause');
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
                        $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
                            slicky();
                        });
                        $('#mainBannerDivParent').empty();
                        var origMainBanner = "<div class='col-xs-9 col-sm-9 col-md-9 banner mainBanner'><div class='banner-slider__details'><h3 class='slider__details__title'></h3><p class='slider__details__description'></p><div id ='divVideo'></div></div><div class='banner-slider'><div class ='divImage'><div class='mask'></div></div></div></div>";

                        $('#mainBannerDivParent').append(origMainBanner);
                        $('.modal-slider').empty();
                        $('.modal-slider').removeData();
  
                        str = "";
                        for (x in data[0]) {
                            if(data[0][x]['media_path'] != null){
                                str += ('<div class ="divImage"><img data-lazy = "{{ URL::to("/") }}/' + data[0][x]['media_path'] + '"></div>');
                                $('.banner-slider').html(str);
                            }else{
                                str += ('<div class ="divImage"><img style="width:500px;height:400px;margin:auto;" src = "{{ URL::to("/") }}/public/scheduleImages/SliderNoImage.png' + '"></div>');
                                $('.banner-slider').html(str);
                            }
                        }
                        $('.slider__details__title').html(data[0][0]['title']);
                        $('.slider__details__description').html(data[0][0]['descriptions']);
                        if (data[0][0]['video'] !== "") {
                            $('#divVideo').append("<a onclick='slickPause()' style='' id='videoId' data-toggle='modal' data-target='#modal-movie' class='btn btn-red btn-custom-lg'>Watch Video</a>");
                        }
                        if (data[0][0]['video'] != null) {
                            videoPlay(data[0][0]['video']);
                        }
                    })
                });
            });
        });
    });

    //this function is for appending video for video modal.
    function videoPlay(videofile) {
        if(videofile !== ''){
            $('.modal-slider').append('<video width="800" height="500" id="video-modal" controls><source src="{!! URL::to("/") !!}/public/scheduleImages/'+ videofile+'">Your browser does not support the video tag.</video>');
        }
    }
    //initialize slicky(banners)
    slicky();
    function slicky() {
        //counts the length of banner or images of banner.
        item_length = $('.banner-slider > div').length;

        //horizontal slick(banner).
        var slider = $('.banner-slider').slick({
            autoplay: true,
            dots: true,
            infinite: true,
            autoplaySpeed: 4000,
            pauseOnHover: false,
            speed: 500
        });

        //vertical slick(banner).
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
        var current = $('.divImage.slick-active').attr('data-slick-index');
        var scheduleCount = {{ $scheduleCount }};
        var scheduleIndeces = $('.schedule__list--active').attr('data-slick-index');
	  console.log(item_length-1 +' = '+ current);
//	  console.log(scheduleCount-1 +' '+ scheduleIndeces)
        if(status == 0){
            if(item_length-1 == current){
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
                    },3500);
                }else if (item_length-1 == 0){
                    setTimeout(function () {
                        setTimeout(function () {
                            if(status == 0){
                                $('.slick-next').click();
                                $('.schedule__list--active').next().addClass('schedule__list--active');
                                $('.schedule__list--active').prev().removeClass('schedule__list--active');
                                $('.schedule__list--active .scheduleId:first-child').click();
                            }
                        });
                    },3500);
                }else{
                    setTimeout(function () {
                        if(status == 0){
//                            currentsLide--;
                            $('.slick-next').click();
                            $('.schedule__list--active').next().addClass('schedule__list--active');
                            $('.schedule__list--active').prev().removeClass('schedule__list--active');
                            $('.schedule__list--active .scheduleId:first-child').click();
                        }
                    },3500);
                }
            }
        }
    });

    $(document).ready(function(){

        $('.banner-slider').on('afterChange', function () {
            var current = $('.divImage.slick-active').attr('data-slick-index');
            var scheduleCount = {{ $scheduleCount }};
            var scheduleIndeces = $('.schedule__list--active').attr('data-slick-index');
            console.log(item_length-1 +' = '+ current);
//	  console.log(scheduleCount-1 +' '+ scheduleIndeces)
            if(status == 0){
                if(item_length-1 == current){
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
                        },3500);
                    }else if (item_length-1 == 0){
                        setTimeout(function () {
                            setTimeout(function () {
                                if(status == 0){
                                    $('.slick-next').click();
                                    $('.schedule__list--active').next().addClass('schedule__list--active');
                                    $('.schedule__list--active').prev().removeClass('schedule__list--active');
                                    $('.schedule__list--active .scheduleId:first-child').click();
                                }
                            });
                        },3500);
                    }else{
                        setTimeout(function () {
                            if(status == 0){
//                            currentsLide--;
                                $('.slick-next').click();
                                $('.schedule__list--active').next().addClass('schedule__list--active');
                                $('.schedule__list--active').prev().removeClass('schedule__list--active');
                                $('.schedule__list--active .scheduleId:first-child').click();
                            }
                        },3500);
                    }
                }
            }
        });
        $('.buttonDots').on('click', function(){
            var current = $('.divImage.slick-active').attr('data-slick-index');
            var scheduleCount = {{ $scheduleCount }};
            var scheduleIndeces = $('.schedule__list--active').attr('data-slick-index');
//            console.log(item_length-1 +' = '+ current);
//	  console.log(scheduleCount-1 +' '+ scheduleIndeces)
            if(status == 0){
                if(item_length-1 == current){
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
                        },3500);
                    }else{
                        setTimeout(function () {
                            if(status == 0){
//                            currentsLide--;
                                $('.slick-next').click();
                                $('.schedule__list--active').next().addClass('schedule__list--active');
                                $('.schedule__list--active').prev().removeClass('schedule__list--active');
                                $('.schedule__list--active .scheduleId:first-child').click();
                            }
                        },3500);
                    }
                }
            }
        });
    });

    // pauses the banner if the video modal was shown or the video button was clicked.
    function slickPause(){
        status = 1;
        console.log('pause');
        $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
            $('.banner-slider').slick('slickPause');
        });
    }

    // pauses the video if the modal close was clicked.
    $('.modal-close').on('click', function(){
        $('video').trigger('pause');
        status = 0;
        var current = $('.divImage.slick-active').attr('data-slick-index');
        var scheduleCount = {{ $scheduleCount }};
        var scheduleIndeces = $('.schedule__list--active').attr('data-slick-index');
        console.log(item_length -1+','+ current);
        if(item_length == 1){
            //do nothing
        }else{
            $.getScript("{{ URL::to('/')}}/public/scheduler/js/slick.js",function(){
                $('.banner-slider').slick('slickPlay');
            });
        }
    });
</script>
@stop    