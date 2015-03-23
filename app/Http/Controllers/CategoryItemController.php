<?php namespace App\Http\Controllers;

use Theme;
use View;
use App;

class CategoryItemController extends Controller {

	public function index($slug)
	{
		Theme::setLayout('frontend.app');
		$item = App\Items::where('slug', $slug)->where('status',1)->first();
		View::share('item',$item);
		View::share('title',$item->title);
		return Theme::view('frontend/category-item');
	}

}
