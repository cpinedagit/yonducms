<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;

class SiteController extends Controller {

	public function index()
	{
		$pagesNum = Page::checkIfEmpty();

		if($pagesNum == 0 || $pagesNum == null) {
			return view('site/Pages/empty');
		} else {			
			$first = Page::getFirstPage();			
			$pages = Page::preview($first->slug);

	        if (count($pages) > 0) {	            
	            $objMenu = Menu::ParentNavi();
	            $content = str_replace("[", "<?php echo ", $pages->content);
	            $content = str_replace("]", "?>", $content);
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

}
