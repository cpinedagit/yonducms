@extends('site.home')
@section('sitecontent')
<div class="col-md-12">
  	<div class="col-md-7">
		<h1> {{$result->news_title}} </h1>
		<div id="photo">
            {!! HTML::image($imagesPath.$result->image_filename,"alt",array("height"=>250,"width"=>600)) !!}
        </div>
		<div>{!! $result->news_content !!}</div>
	</div>
	<div class="col-md-5">
	{!! news_archive() !!}
  	{!! featured_news() !!}
  </div>
</div>
@stop