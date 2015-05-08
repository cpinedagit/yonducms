@extends('app')

@section('content')
<?php extract($data); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><b>News Feeds: <a href="{{ $permalink }}">{{ $title }}</a> </b></div>
				<div class="panel-body">
					@foreach ($items as $item)
				    <div class="media">
					  <div class="media-left media-middle">
					    <!--  Image -->
						@if ($enclosure = $item->get_enclosure(0))
							@if ($enclosure->get_thumbnail())
								<div><img src="{{ $enclosure->get_thumbnail() }}" alt="" class="media-object" /></div>
							@endif
						@endif
						<!--  Image -->
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">
					    	<a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a>
					    </h4>
				      	<p>{{ $item->get_description() }}</p>
					    
					  </div>
					</div>
				  @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
