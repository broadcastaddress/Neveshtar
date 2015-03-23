<?php namespace App\Http\Controllers;

use Theme;
use View;
use App;
use Request;

class CategoryController extends Controller {

	public function show($slug)
	{
		$item = App\Category::where('slug',$slug)->where('status',1)->first();
		View::share('item',$item);
		$posts = App\Category::find($item->id)->items()->paginate(10);
		View::share('posts',$posts);
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
