<?php namespace App\Http\Controllers;

use Theme;
use View;
use App;
use Request;
use Lang;

class CategoryController extends Controller {

	public function show($slug)
	{
		$item = App\Category::where('slug',$slug)->where('language',Lang::getLocale())->where('status',1)->first();
		View::share('item',$item);
		$posts = App\Category::latestTopic($item->id,20,0);
		View::share('posts',$posts);

		//Sidebar Stuff
		$categories = App\Category::where('parent_id',$item->parent_id)->where('language',Lang::getLocale())->where('status',1)->get();
		View::share('categories',$categories);
		$subcategories = App\Category::where('parent_id',$item->id)->where('language',Lang::getLocale())->where('status',1)->get();
		View::share('subcategories',$subcategories);
		$recent = App\Items::where('status',1)->where('type','item')->where('language',Lang::getLocale())->orderBy('id','desc')->take(4)->get();
		View::share('recent',$recent);
		$viewed = App\ItemView::difference(30,5);
		View::share('viewed',$viewed);
		$commented = App\Comments::difference(30,5);
		View::share('commented',$commented);
		$photos_stream = App\Items::where('status',1)->where('image_id','<>','null')->where('language',Lang::getLocale())->orderBy('id','desc')->groupBy('image_id')->take(8)->get();
		View::share('photos_stream',$photos_stream);
		$tags = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->take(8)->get();

		$tags = null;
		$itemtags = App\Items::where('language',Lang::getLocale())->with(['tags' => function ($q) use (&$tags) {
		  $tags = $q->orderBy('id','DESC')->get();
		}])->get();
		if($tags) {
			$tags = $tags->unique(20);
		};
		View::share('tags',$tags);

		if($item->parent_id) {
			$parent_category = App\Category::where('id',$item->parent_id)->first();
			$parentcategories = App\Category::where('parent_id',$parent_category->parent_id)->where('language',Lang::getLocale())->where('status',1)->get();
			View::share('parentcategories',$parentcategories);
		};
		//End Sidebar stuff

		Theme::setLayout('frontend.app');
		View::share('title',$item->title);
		if($item->type == "category") {
			return Theme::view('frontend/category');
		};
		if($item->type == "portfolio") {
			return Theme::view('frontend/portfolio');
		};
		if($item->type == "about_us") {
			return Theme::view('frontend/about');
		};
		if($item->type == "services") {
			return Theme::view('frontend/services');
		};
		if($item->type == "faq") {
			return Theme::view('frontend/faq');
		};
		if($item->type == "gallery") {
			return Theme::view('frontend/gallery');
		};
		if($item->type == "careers") {
			return Theme::view('frontend/careers');
		};
	}

}
