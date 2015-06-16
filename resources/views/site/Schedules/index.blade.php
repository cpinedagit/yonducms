{!! HTML::script('public/js/beam/modernizr.js') !!}
{!! Form::hidden('numberOfImages',$numberOfImages,['class' => 'form-control Nform-control', 'id' => 'numberOfImages']) !!}
<div class="carousel carousel-showmanymoveone slide" id="main-carousel" style ="">
    <div class="carousel-inner">
	  @foreach($Banners as $currentImage)
	  <div class="item">
		<div style="{{ 'width:'.$standardBannerWidth.'%' }}" class ='divImg'> {!! HTML::image($currentImage->media_path) !!}</a></div>
	  </div>
	  @endforeach 

    </div>
    <a class="left carousel-control" href="#main-carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
    <a class="right carousel-control" href="#main-carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right" ></i></a>
</div>


<script>
    $(document).ready(function () {
	  $(".item:first-child").addClass("active"); 

    });

</script>