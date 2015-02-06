<?php namespace App\Http\Controllers;

use Theme;
use View;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		Theme::setLayout('frontend.app');
		View::share('title','Neveshtar - Open Source Laravel CMS');
		return Theme::view('frontend/index-header-fix');
	}

}
