<div class="col-md-12">
  	@foreach ($results as $result)
  	<div>
  		<h3>{!! HTML::linkAction('Site\NewsController@preview',  $result->news_title , array($slug,$result->slug)) !!}</h3>
  		 <div class="col-md-12">
 		 	<div class="col-md-4">
  		  		{!! HTML::image("$imagesPath"."thumbnail-"."$result->image_filename","alt",array("height"=>150,"width"=>150)) !!}
  			</div>
  			<div class="col-md-8">
  				{!! $result->description !!}
  			</div>
  		</div>
  	</div>
  	@endforeach
  </div>