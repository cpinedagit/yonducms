<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
Use Feeds;

class NewsFeedsController extends Controller {

	public function index()
	{
		//Add .rss link
		$feed = Feeds::make(env('APP_RSS_FEED'));
	    $data = array(
	      'title'     => $feed->get_title(),
	      'permalink' => $feed->get_permalink(),
	      'items'     => $feed->get_items(),
	    );
	   
	    return View('cms.news_feeds.index')->withData($data);	
	}

}
