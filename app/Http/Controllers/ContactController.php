<?php namespace App\Http\Controllers;

use Theme;
use View;
use Lang;

class ContactController extends Controller {

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
		View::share('title',Lang::get('site.contact'));
		return Theme::view('frontend/contact');
	}

}
