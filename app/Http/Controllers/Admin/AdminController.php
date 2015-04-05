<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;
use Theme;
use App;

class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

    protected $new_comments;

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('checkInputs');
        $this->new_comments = App\Comments::where('status',0)->select(array('id'))->get();
        View::share('new_comments', $this->new_comments);
	}

	public function index() {

		View::share('active','dashboard');
		Theme::setLayout('admin.app');
		View::share('title', 'dashboard');
		return Theme::view('admin/index');
	}

}
