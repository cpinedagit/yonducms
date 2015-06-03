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
  						<li>{!! HTML::linkAction('Site\NewsController@preview',  $news->news_title , array(news_slug(),$news->slug)) !!}</li>
  						@endforeach
  					</ul>
  				</li>
  				@endforeach
  			</ul>
  		<li/>
  	@endforeach
  </ul>