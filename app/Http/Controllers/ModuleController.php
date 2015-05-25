<?php namespace App\Http\Controllers;

use app\Http\Requests;
use app\Http\Controllers\Controller;
//use Controller;

use DB;
use Input;
use Request;
use Response;

class ModuleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($message = NULL)
	{
		$this->regenerateMenuSession('modules.index', 'modules.index');
		//$moduleScript = 'SELECT modules.id, modules.module_name, modules.module_description, modules.enabled FROM `modules` WHERE ?';
		//$moduleList = DB::select($moduleScript, array(1));
		$moduleList = DB::table('modules')
					->where('module_type', '=', '1')
					->select('id', 'module_name', 'module_description', 'enabled', 'module_type')
					->get();

		return view('modules.manager')->with([
				'modules' => count($moduleList),
				'data' => (array) $moduleList,
				'message'	=> $message
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function toggleModule()
	{
		// $moduleID = $_POST['id'];
		// $response = array(
		// 	'id'	=> $moduleID,
		// 	'enabled'	=> 'true'
		// );
		// echo JSON_ENCODE($response);
		// 
		$input = Request::all();
		$moduleID = $input['id'];
		$currentStatus = DB::table('modules')->where('id', $moduleID)->pluck('enabled');
		if(is_null($currentStatus)) {
			echo JSON_ENCODE("010101");
		}
		$newStatus = abs($currentStatus - 1);
		$updatedStatus = DB::table('modules')
			->where('id', $moduleID)
			->update(array('enabled' => (String) $newStatus));
		echo JSON_ENCODE($newStatus);
	}

	public function upload()
	{
		//Get input.
		$input = Request::all();
		if( Input::hasFile('module') ) {
			$file = Input::file('module');
			$filename = "module.tar.gz";
			$destinationPath = '../storage/modules/';
			$upload_success = $file->move($destinationPath, $filename);
			if($upload_success) {
				$response = require_once('../app/Modules/Install_Module.php');
				if($response) {
					$message = "Module installed successfully.";
				} else {
					$message = "There was an error with your installation.";
				}
			} else {
				$message = "There was a problem with the file upload.";
			}
		} else {
			$message = "No file selected for upload.";
		}
		return $this->index($message);
	}

}
