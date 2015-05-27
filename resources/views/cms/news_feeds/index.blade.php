@extends('cms.home')

@section('title')
  <h2>Dashboard</h2>
@stop

@section('content')

@if((Session::has('message')))
  <!-- Flash Update Your Password Message -->
      <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
  <!-- Flash Update Your Password Message -->
@endif
<div class='main-container__content__info'>
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default panel--dashboard panel--dashboard--newsfeeds">
              <div class="panel-heading"><h4>News Feeds</h4></div>
              <div class="panel-body">
                <div class="panel-body__holder">
                    <ul class="media-list media-list-dashboard">
                      @foreach ($data['news_feeds']['items'] as $item)
					    <li class="media">
                        <div class="media-left">
                          	<!--  Image -->
							@if ($enclosure = $item->get_enclosure(0))
								@if ($enclosure->get_thumbnail())
									<img src="{{ $enclosure->get_thumbnail() }}" alt="" class="media-object" />
								@endif
							@endif
							<!--  Image -->
                        </div>
                        <div class="media-body rss-feeds-body">
                          <h4 class="media-heading">{{ $item->get_title() }}</h4>
                          	<label class="media-details-intro">{{ $item->get_description() }}</label>
                          <div class="media-details">
                              <span>Date:{{ $item->get_date('m/d/y') }}</span>
                              <span></span>
                              <span class="text-right"><a href="{{ $item->get_permalink() }}" target="_blank">View More</a></span>
                          </div>
                        </div>
                      </li>
					  @endforeach
                    </ul>
                </div>
                    
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default panel--dashboard panel--dashboard--notifications">
              <div class="panel-heading"><h4>Notifcations</h4></div>
              <div class="panel-body">
                <div role="tabpanel" class="tabpanel-custom tabpanel--dashboard">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#news" aria-controls="home" role="tab" data-toggle="tab">News</a></li>
                    <li role="presentation">
                        <a href="#system" aria-controls="messages" role="tab" data-toggle="tab">System</a>
                        @if(count($data['user_requests'])>0)
                        	<span class="badge badge--right">{{ count($data['user_requests']) }}</span>
                        @endif
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="news">
                        <h4>News Summary</h4>
                       <div class="main-container__content__info__photo">
                          <table class="table table-hover table-news-summary">
							 <?php $news = $data['news_summary']; ?>
                              <tbody>
                                  <tr class="all">
                                      <td><strong>{{ $news['all_news'] }}</strong></td>
                                      <td>Articles</td>
                                  </tr>
                                  <tr>
                                      <td><strong>{{ $news['published'] }}</strong></td>
                                      <td>Published</td>
                                  </tr>
                                  <tr>
                                      <td><strong>{{ $news['all_news']-$news['published'] }}</strong></td>
                                      <td>Unpublished</td>
                                  </tr>
                                  <tr>
                                      <td><strong>{{ $news['featured'] }}</strong></td>
                                      <td>Featured</td>
                                  </tr>
                                  <tr>
                                      <td><strong>{{ $news['all_news']-$news['featured'] }}</strong></td>
                                      <td>Unfeatured</td>
                                  </tr>
                              </tbody>
                          </table>
                       </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="system">
                        <div class="panel-body__holder panel-body__holder--notification">
                            <ul class="list-unstyled media-circle-list">
                                @foreach ($data['user_requests'] as $user)
								    <li>
									    <div class='image-holder'>
	                                       <div class="circle image-holder__user-pic">
	                                           <!--  Image -->	
										    @if($user->profile_pic!="")
												{!! HTML::image("public/images/profile/".$user->profile_pic, "", []) !!}
											@else
											    {!! HTML::image("public/images/profile/default_pic.png", "", []) !!}
											@endif
											<!--  Image -->
	                                       </div>
	                                    </div>
	                                    <div class='desc-holder'>
	                                        <p>{{ $user->username }}: {{ $user->first_name." ".$user->last_name }}</p>
	                                        <p>Change password request</p>
	                                    </div>
									</li>
							  	@endforeach
							 	@if(count($data['user_requests'])==0)
									<p>No request found!</p>
							  	@endif
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
                    
              </div>
            </div>
        </div>
    </div>
</div>

@endsection