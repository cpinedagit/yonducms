<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Site\News;
use Input;
use DB;
use File;
use Request;
use Response;
use View;

class PageController extends Controller {

    public function __construct() {
	  //Read the settings .env set app title and tag line
	  View::share('APP_TITLE', env('APP_TITLE'));
	  View::share('APP_TAG_LINE', env('APP_TAG_LINE'));
	  $this->middleware('guest'); 

	  //$this->middleware('guest'); 	 //Doesn't require active user
	   // $this->middleware('is.allowed'); Require require active user
	  //$this->middleware('is.allowed');
    }


    public function preview($slug) {
    	
	  $pages = Page::preview($slug);
	  if (count($pages) > 0) {


		$objMenu = Menu::ParentNavi();
		$content = str_replace("[", "<?php echo ", $pages->content);
		$content = str_replace("]", "?>", $content);
//            dd($content );
		$arData = array(
		    'content' => $content,
		    'pages' => $pages,
		    'objMenu' => $objMenu
		);
		return view('site/Pages/index', $arData);
	  } else {
		return view('site/Pages/404');
	  }
    }

  

}
