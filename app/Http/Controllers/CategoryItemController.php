<?php namespace App\Http\Controllers;

use Theme;
use View;
use App;
use Lang;
use Input;
use Redirect;
use Auth;

class CategoryItemController extends Controller {

	public function index($slug)
	{
		Theme::setLayout('frontend.app');
		$item = App\Items::where('slug', $slug)->where('status',1)->first();

		//Sidebar Stuff
		$cat = App\Category::where('id', $item->category_id)->select(array('id', 'parent_id'))->first();
		$categories = App\Category::where('parent_id',$cat->parent_id)->where('status',1)->get();
		View::share('categories',$categories);
		$subcategories = App\Category::where('parent_id',$cat->id)->where('status',1)->get();
		View::share('subcategories',$subcategories);
		$recent = App\Items::where('status',1)->where('language',Lang::getLocale())->orderBy('id','desc')->take(4)->get();
		View::share('recent',$recent);
		$viewed = App\ItemView::difference(30,5);
		View::share('viewed',$viewed);
		$commented = App\Comments::difference(30,5);
		View::share('commented',$commented);
		$photos_stream = App\Items::where('status',1)->where('image_id','<>','null')->where('language',Lang::getLocale())->orderBy('id','desc')->groupBy('image_id')->take(8)->get();
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

		if($cat->parent_id) {
			$parent_category = App\Category::where('id',$cat->parent_id)->first();
			$parentcategories = App\Category::where('parent_id',$parent_category->parent_id)->where('status',1)->get();
			View::share('parentcategories',$parentcategories);
		};
		//End Sidebar stuff

		$itemView = new App\ItemView();
		$itemView->item_id = $item->id;
		if(!Auth::guest()) {
			$itemView->user_id = Auth::user()->id;
		};
		$itemView->save();

		View::share('item',$item);
		View::share('title',$item->title);
		if($item->type == "item") {
			return Theme::view('frontend/category-item');
		};
		if($item->type == "portfolio") {
			return Theme::view('frontend/category-portfolio');
		};
	}

	public function comment($slug)
	{

		if(Input::get('comment') <> '') {
			$item = App\Items::where('slug', $slug)->where('status',1)->select(array('id'))->first();
			$comment = new App\Comments;
			$comment->description = Input::get('comment');
			$comment->item_id = $item->id;
			$comment->parent_id = null;
			$comment->status = 0;
			$comment->user_id = Auth::user()->id;
			$comment->save();
		};
		return Redirect::back()->with('message', Lang::get('site.comment_submitted'));

	}

}
