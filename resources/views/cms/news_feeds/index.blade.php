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
                        @if(empty($data['news_feeds']['items']))
                          <li>No RSS Link found, please check general settings menu.</li>
                        @endif
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
                    @if(checkAccess(5)>0)
                      <li role="presentation" class="active"><a href="#news" aria-controls="home" role="tab" data-toggle="tab">News</a></li>
                    @endif
                    @if(checkAccess(2)>0)
                      <li role="presentation" ><a href="#pages" aria-controls="home" role="tab" data-toggle="tab">Pages</a></li>
                    @endif
                    @if(checkAccess(4)>0)
                      <li role="presentation" ><a href="#banners" aria-controls="home" role="tab" data-toggle="tab">Banners</a></li>
                    @endif
                    @if(checkAccess(8)>0)
                      <li role="presentation">
                          <a href="#system" aria-controls="messages" role="tab" data-toggle="tab">System</a>
                          @if(count($data['user_requests'])>0)
                          	<span class="badge badge--right">{{ count($data['user_requests']) }}</span>
                          @endif
                      </li>
                    @endif
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    @if(checkAccess(5)>0)
                      <div role="tabpanel" class="tab-pane active" id="news">
                          <h4>News Summary</h4>
                         <div class="main-container__content__info__photo">
                            <table class="table table-hover table-news-summary">
  							             <?php $news = $data['news_summary']; ?>
                                <tbody>
                                    <tr class="all">
                                        <td class="indent-right"><strong>{{ $news['all_news'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/news', 'Articles', ['class'=>'dboard-link-active']) !!}  </td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $news['published'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/news', 'Published', ['class'=>'dboard-link']) !!} </td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $news['all_news']-$news['published'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/news', 'Unpublished', ['class'=>'dboard-link']) !!} </td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $news['featured'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/news', 'Featured', ['class'=>'dboard-link']) !!} </td>
                                    </tr> 
                                    <tr>
                                        <td class="indent-right"><strong>{{ $news['all_news']-$news['featured'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/news', 'Unfeatured', ['class'=>'dboard-link']) !!} </td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                      </div>
                    @endif
                    @if(checkAccess(2)>0)
                      <div role="tabpanel" class="tab-pane" id="pages">
                          <h4>Pages Summary</h4>
                         <div class="main-container__content__info__photo">
                            <table class="table table-hover table-news-summary">
  							             <?php $pages = $data['pages_summary']; ?>
                                <tbody>
                                    <tr class="all">
                                        <td class="indent-right"><strong>{{ $pages['all_pages'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/pages', 'Articles', ['class'=>'dboard-link-active']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $pages['published'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/pages', 'Published', ['class'=>'dboard-link']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $pages['all_pages']-$pages['published'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/pages', 'Unpublished', ['class'=>'dboard-link']) !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                      </div>
                    @endif
                    @if(checkAccess(4)>0)
                      <div role="tabpanel" class="tab-pane" id="banners">
                          <h4>Banners Summary</h4>
                         <div class="main-container__content__info__photo">
                            <table class="table table-hover table-news-summary">
  							             <?php $banners = $data['banners_summary']; ?>
                                <tbody>
                                    <tr class="all">
                                        <td class="indent-right"><strong>{{ $banners['all_banners'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/banners', 'Banners', ['class'=>'dboard-link-active']) !!} </td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $banners['advanced'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/banners', 'Advanced', ['class'=>'dboard-link']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="indent-right"><strong>{{ $banners['all_banners']-$banners['advanced'] }}</strong></td>
                                        <td class="indent-right"> {!! HTML::link(URL().'/cms/banners', 'Standard', ['class'=>'dboard-link']) !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                      </div>
                    @endif
                    @if(checkAccess(8)>0)
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
                                        {!! HTML::linkRoute('cms.user.edit', 'Change password request', $user->username, ['class'=>'dboard-link']) !!} 
                                      </div>
            									      </li>
							  	                 @endforeach
              							 	     @if(count($data['user_requests'])==0)
              									     <li>No request found!</li>
              							  	   @endif
                            </ul>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
                    
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    //Add active class 
    $('.nav-tabs').find('li').first().addClass('active');
    $('.tab-pane').first().addClass('active');

    //Add dashboard to home
    $('.breadcrumb').first().append("<li class='active'>Dashboard</li>");
  });
</script>

<!-- 
  Check if RSS Feeds is enabled 
  Hide RSS Div and extend notifications summary
-->
@if(empty($data['news_feeds']['items']))
<style type="text/css">
  .col-sm-8{
    display: none;
  }

  .col-sm-4{
    width: 100%;
  }
</style>
@endif
<!-- Check if RSS Feeds is enabled -->

<!-- 
John 3:16
For God so loved the world that he gave his one and only Son, 
that whoever believes in him shall not perish but have eternal life.
-->

@endsection