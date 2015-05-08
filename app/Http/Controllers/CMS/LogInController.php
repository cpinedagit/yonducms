<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Carbon\Carbon;
use Auth;

//Import User Data
use App\Models\cms\User;

class LogInController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function __contruct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('cms.log_in.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		User::createUser();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::attempt(array('username' => Request::get('username'), 'password' => Request::get('password'))))
		{
		    echo 'Welcome'. Request::get('username');
		}
		else
		{
			echo 'Sorry I dont know you!';
			//return Redirect('login')->withMessage("SORRY LOGIN FAILED!");
		}
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

	public function home()
	{
		return view('cms.welcome');
	}
}
