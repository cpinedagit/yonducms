<?php extract($data['news_feeds']); ?>
	<div class="main-container__content__info dash-board-feeds">
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading"><b>Vendor News Feed: <a href="{{ $permalink }}">{{ $title }}</a> </b></div>
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

		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading"><b>Reset password requests.</b></div>
				<div class="panel-body">
					@foreach ($data['user_requests'] as $user)
				    <div class="media">
					  <div class="media-left media-middle">
					    <!--  Image -->	
					    @if($user->profile_pic!="")
							<div> {!! HTML::image("public/images/profile/".$user->profile_pic, "", array("class"=>"media-object circle main-container__navigation-container__welcome__icon")) !!}</div>
						@else
							<div> {!! HTML::image("public/images/profile/default_pic.png", "", array("class"=>"media-object circle main-container__navigation-container__welcome__icon")) !!}</div>
						@endif
						<!--  Image -->
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">
					    	{{ $user->username }}
					    </h4>
				      	<p>{{ $user->first_name." ".$user->last_name }}</p>
					  </div>
					</div>
				  @endforeach
				  @if(count($data['user_requests'])==0)
					<p>No request found!</p>
				  @endif
				</div>
			</div>
		</div>
	</div>
