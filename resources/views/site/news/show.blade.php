@extends('index')
@section('content')
<div class="col-md-12">
  	<div class="col-md-7">
		<h1> {{$result->news_title}} </h1>
		<div>{!! $result->news_content !!}</div>
	</div>
	<div class="col-md-5">
		Archives
		<ul>
	  	@foreach ($archive as $key=>$value)
	  		<li>{{ $key }}</li>
	  		<li>
	  			<ul>
	  				@foreach ($value as $keyMonth =>$valueMonth)
	  				<li>{{ $keyMonth }}</li>
	  				<li>
	  					<ul>
	  						@foreach ($valueMonth as $news)
	  						<li>{!! HTML::linkAction('Site\NewsController@show',  $news->news_title , array($news->news_id)) !!}</li>
	  						@endforeach
	  					</ul>
	  				</li>
	  				@endforeach
	  			</ul>
	  		<li/>
	  	@endforeach
	  	</ul>
  	@include('site.news.news_tool')
  </div>
</div>
@stop