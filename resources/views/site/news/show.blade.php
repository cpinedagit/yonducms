@extends('site.home')
@section('sitecontent')
<div class="col-md-12">
  	<div class="col-md-7">
		<h1> {{$result->news_title}} </h1>
		<div id="photo">
            {!! HTML::image($result->image_path.$result->image_filename,"alt",array("height"=>250,"width"=>600)) !!}
        </div>
		<div>{!! $result->news_content !!}</div>
	</div>
	<div class="col-md-5">
	@include('site.news.news_archive_tool')
  	@include('site.news.news_tool')
  </div>
</div>
@stop