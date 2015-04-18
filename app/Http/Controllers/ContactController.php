<?php namespace App\Http\Controllers;

use Theme;
use View;
use Lang;
use Input;
use Auth;
use App;
use Redirect;

class ContactController extends Controller {

	public function index()
	{
		Theme::setLayout('frontend.app');
		View::share('title',Lang::get('site.contact'));
		return Theme::view('frontend/contact');
	}

	public function feedback()
	{

		if(Input::get('message') <> '') {
			$feedback = new App\Feedbacks;
			$feedback->message = Input::get('message');
			$feedback->email = Input::get('email');
			$feedback->name = Input::get('name');
			if (isset(Auth::user()->id)) {
				$feedback->user_id = Auth::user()->id;
			};
			$feedback->save();
		};
		return Redirect::back()->with('message', Lang::get('site.feedback_submitted'));

	}

}
