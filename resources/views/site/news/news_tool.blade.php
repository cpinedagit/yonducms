  Featured News
    <ul>
      @foreach(featured_news() as $news)
      <li>{!! HTML::linkAction('Site\NewsController@preview',  $news->news_title , array(news_slug(),$news->slug)) !!}</li>
      @endforeach
    </ul>