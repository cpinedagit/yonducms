  Featured News
    <ul>
      @foreach(featured_news() as $news)
      <li>{!! HTML::linkAction('Site\NewsController@show',  $news->news_title , array($news->news_id)) !!}</li>
      @endforeach
    </ul>