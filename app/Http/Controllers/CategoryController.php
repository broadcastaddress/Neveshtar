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
		$subcategories = App\Category::where('parent_id',$item->id)->where('status',1)->get();
		View::share('subcategories',$subcategories);
		if($item->parent_id) {
			$parent_category = App\Category::where('id',$item->parent_id)->first();
			$parentcategories = App\Category::where('parent_id',$parent_category->parent_id)->where('status',1)->get();
			View::share('parentcategories',$parentcategories);
		};
		Theme::setLayout('frontend.app');
		View::share('title',$item->title);
		return Theme::view('frontend/category');
	}

}
