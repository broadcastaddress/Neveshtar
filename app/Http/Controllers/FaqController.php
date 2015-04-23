<?php namespace App\Http\Controllers;

use Theme;
use View;

class FaqController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	public function index()
	{
		Theme::setLayout('frontend.app');
		View::share('title','Neveshtar - Open Source Laravel CMS');
		return Theme::view('frontend/faq');
	}

}
