<?php namespace App\Http\Controllers;

use Theme;
use View;
use App;
use Request;
use Lang;

class CategoryController extends Controller {

	public function show($slug)
	{
		$item = App\Category::where('slug',$slug)->where('status',1)->first();
		View::share('item',$item);
		$posts = App\Category::find($item->id)->items()->paginate(10);
		View::share('posts',$posts);

		//Sidebar Stuff
		$categories = App\Category::where('parent_id',$item->parent_id)->where('status',1)->get();
		View::share('categories',$categories);
		$subcategories = App\Category::where('parent_id',$item->id)->where('status',1)->get();
		View::share('subcategories',$subcategories);
		$recent = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->take(4)->get();
		View::share('recent',$recent);
		$viewed = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->take(4)->get();
		View::share('viewed',$viewed);
		$commented = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->take(4)->get();
		View::share('commented',$commented);
		$photos_stream = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->groupBy('image_id')->take(8)->get();
		View::share('photos_stream',$photos_stream);
		$tags = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->take(8)->get();

		$tags = null;
		$itemtags = App\Items::with(['tags' => function ($q) use (&$tags) {
		  $tags = $q->orderBy('id','DESC')->get();
		}])->get();
		if($tags) {
			$tags = $tags->unique(20);
		};
		View::share('tags',$tags);

		if($item->parent_id) {
			$parent_category = App\Category::where('id',$item->parent_id)->first();
			$parentcategories = App\Category::where('parent_id',$parent_category->parent_id)->where('status',1)->get();
			View::share('parentcategories',$parentcategories);
		};
		//End Sidebar stuff

		Theme::setLayout('frontend.app');
		View::share('title',$item->title);
		return Theme::view('frontend/category');
	}

}
