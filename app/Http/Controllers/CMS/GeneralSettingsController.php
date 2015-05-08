<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Storage;
use Session;
use Input;

class GeneralSettingsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$this->regenerateMenuSession('cms.general_settings.index', 'cms.general_settings.index');
		$env = file('.env'); 		//Open .env File input as Array
		Session::put('env', $env);		//Set it to an Session to be use later

		return view('cms.general_settings.index', compact('env'));
	}

	
	public function update($id)
	{
		$modules = $this->loadModules();
		$submenus = $this->loadSubMenus();
		$data = (object) array(
							'modules' => $modules,
							'submenus' => $submenus);
		//Loop into Session env and set new variables
		//Based on user inputs
		foreach (Session::get('env') as $key => $value) 
		{
			switch ($key) 
			{
				case 3:
					Session::put('env.3', 'APP_TITLE='.Input::get('APP_TITLE').PHP_EOL);
				break;
				case 4:
					Session::put('env.4', 'APP_TAG_LINE='.Input::get('APP_TAG_LINE').PHP_EOL);
				break;
				case 15:
					Session::put('env.15', 'MAIL_DRIVER='.Input::get('MAIL_DRIVER').PHP_EOL);
				break;
				case 16:
					Session::put('env.16', 'MAIL_HOST='.Input::get('MAIL_HOST').PHP_EOL);
				break;
				case 17:
					Session::put('env.17', 'MAIL_PORT='.Input::get('MAIL_PORT').PHP_EOL);
				break;
				case 18:
					Session::put('env.18', 'MAIL_USERNAME='.Input::get('MAIL_USERNAME').PHP_EOL);
				break;
				case 19:
					//If we have a new password
					if(Input::get('MAIL_PASSWORD_NEW')!='' || Input::get('MAIL_PASSWORD_NEW')!=' ') 
						Session::put('env.19', 'MAIL_PASSWORD='.Input::get('MAIL_PASSWORD_NEW').PHP_EOL);
					else
						Session::put('env.19', 'MAIL_PASSWORD='.Input::get('MAIL_PASSWORD_ORIG').PHP_EOL);
				break;
				case 21:
					Session::put('env.21', 'APP_RSS_FEED='.Input::get('APP_RSS_FEED').PHP_EOL);
				break;
			}

		}

		//Write Session into .env file
		//Please check config/filesystems.php and check the root disk setting
		Storage::disk('root')->delete('.env'); 
		Storage::disk('root')->put('.env', Session::get('env'));

		return redirect('general_settings', compact('data'));
	
	}


}
