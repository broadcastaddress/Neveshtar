<?php namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use View;
use Theme;
use Lang;
use Illuminate\Routing\Route;
use Input;
use Model;
use Auth;

class CategoriesController extends Controller {

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
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index() {
		View::share('active','categories');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.categories'));
		return Theme::view('admin.categories.index');
	}

	public function create(Route $route) {
		View::share('active','categories');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.category'));
		return Theme::view('admin.categories.create');
	}

	public function store(CategoriesRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = new Categories($data);
	    $db->save();
	}

}
