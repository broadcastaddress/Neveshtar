<?php namespace App\Http\Controllers;

use Theme;
use View;
use App;
use Request;

class CategoryController extends Controller {

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

	public function show($slug)
	{
		$item = App\Category::where('slug',$slug)->where('status',1)->first();
		View::share('item',$item);
		$categories = App\Category::where('parent_id',$item->parent_id)->where('status',1)->get();
		View::share('categories',$categories);
		Theme::setLayout('frontend.app');
		View::share('title',$item->title);
		return Theme::view('frontend/category');
	}

}
