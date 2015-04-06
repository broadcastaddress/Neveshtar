<?php namespace App\Http\Controllers;

use Theme;
use View;
use Lang;
use App;
use Auth;
use Request;

class ProfileController extends Controller {

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
		View::share('title',Lang::get('site.my_profile'));
		View::share('user',App\User::find(Auth::user()->id));
		return Theme::view('frontend/profile');
	}

	public function store()
	{
		if(Request::get('name') <> null) {
			$profile = App\User::find(Auth::user()->id);
			$profile->name = Request::get('name');
			$profile->update();
			return redirect()->back()->with('message',ucfirst(Lang::get('site.info_updated')));
		}
	}

}
