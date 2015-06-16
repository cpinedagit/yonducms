@extends('cms.home')
@section('content')
<script>
    $(document).ready(function () {

        slider_blah();
    });

</script>
<div id='motherDiv'>
    <div class='col-md-8' id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 400px; height: 300px;margin-left:20px;margin-top:20px; ">
        <!-- Slides Container -->
        <div id='container' u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div class ='divImage'>
                {!! HTML::image('public/images/ilong.png',null,['style' => 'width:400px;height:auto;']) !!}
            </div>
        </div>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 123px; right: 0px">
        </span>
    </div>

<!--    <div class="col-md-8" id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 400px; height: 300px;margin-left:20px;margin-top:20px;">

        <div id="container" u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;"> 
            <div class ="divImage">
            </div>
        </div>
        <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>
        <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 123px; left: 0px;"></span>
        <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 123px; right: 0px"></span>
    </div>-->
</div>
<!-- Jssor Slider End -->

<!--vertical slider-->
<div style='margin-left: 700px' class=".col-md-4">
    <div class="slider2">
        @foreach($schedules as $schedule)
        <a class='scheduleId' data-id='{{$schedule->id}}' data-image='{{ $schedule->image }}' href='#'>{!! HTML::image('public/scheduleImages/'.$schedule->image) !!}</a>            
        @endforeach
    </div>
</div>

<!--modal for Main Banner Video link-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Video</h4>
            </div>
            <div class="modal-body">
                <!--body-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
{!! HTML::script('public/vertical_slider/js/slick.js') !!}
<script>
    $('.modal').on('hidden.bs.modal', function () {
        $('.modal-body').empty();
    });


    $('.scheduleId').on('click', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: "{!! URL::to('/') !!}" + "/cms/getBannerImages/" + id,
            dataType: "json",
            success: (function (data) {
                console.log(data);
                $('#mainBannerDivParent').empty();
                var origSlider = '<div class="col-md-8" id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 400px; height: 300px;margin-left:20px;margin-top:20px; "><div id="container" u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;"> <div class ="divImage"></div></div><div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;"><div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div></div><span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 123px; left: 0px;"></span><span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 123px; right: 0px"></span></div>';
                $('#mainBannerDivParent').append(origSlider);
                $('.modal-body').empty();
                videoPlay(data[0][1]['video']);

                str = "";
                for (x in data[0]) {
                    str += ('<div class ="divImage">{!! HTML::image("' + data[0][x]['media_path'] + '", null, ["style" => "width:400px;height:auto;"]) !!}');
                    if (data[0][x]['video'] === "") {
                        str += ('</div>');
                    } else {
                        str += ('<div style="position: absolute; top: 200px; left: 30px">\n\
            <button id="buttonVideow" data-video="' + data[0][x]['video'] + '" dat a-videoplay="' + data[0][x]['video'] + '" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="border-radius: 5px;background-color: red;color:white;">Video</button></div></div>');
                    }
                }
                $('#container').html(str);
                slider_blah();

            })
        });

    });


    function videoPlay(videofile) {

        $('.modal-body').append('<center><video id="video" width="550" controls><source src="{!! URL::to(' / ') !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');

        $('.modal').on('shown.bs.modal', function () {
            $('.modal-body').empty();
            $('.modal-body').append('<center><video id="video" width="550" controls autoplay><source src="{!! URL::to(' / ') !!}/public/scheduleImages/' + videofile + '" type="video/mp4"></video></center>');
        });
    }


    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true
    });

    $('.slider2').slick({
        vertical: true,
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1000

    });

    $('.slider2.slick-vertical .slick-slide.slick-active').first().addClass('custom-slick-active');

</script>



@stop