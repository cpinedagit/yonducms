@extends('index')
@section('content')

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="col-md-12">
  <div class="col-md-7">
  	@foreach ($results as $result)
  	<div>
  		<h3>{!! HTML::linkAction('Site\NewsController@show',  $result->news_title , array($result->news_id)) !!}</h3>
  		 <div class="col-md-12">
 		 	<div class="col-md-4">
  		  		{!! HTML::image("$result->media_path","alt",array("height"=>150,"width"=>150)) !!}
  			</div>
  			<div class="col-md-8">
  				{!! $result->description !!}
  			</div>
  		</div>
  	</div>
  	@endforeach
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