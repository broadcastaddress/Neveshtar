<?php namespace App\Http\Controllers\Admin\Items;

use App\Http\Controllers\Controller;
use App;
use View;
use Theme;
use Lang;
use Illuminate\Routing\Route;
use Input;
use Model;
use Auth;
use Request;

class ItemsController extends Controller {

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
		$this->middleware('checkInputs');
	}

	public function index() {
		View::share('active','items');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.items'));
		View::share('items', Items::all()->take(10));
		View::share('items_total', Items::all()->count());
		return Theme::view('admin.items.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Items::all()->count();
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);

		  $records = array();
		  $records["data"] = array();

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

		  $order = intval($_REQUEST['order'][0]['column']);
		  switch ($order) {
			  case '0':
				  $order = 'id';
				  break;
			  case '1':
				  $order = 'id';
				  break;
			  case '2':
				  $order = 'created_at';
				  break;
			  case '3':
				  $order = 'title';
				  break;
			  case '4':
				  $order = 'language';
				  break;
			  case '5':
				  $order = 'user_id';
				  break;
			  case '6':
				  $order = 'status';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $items = Items::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
		  foreach($items as $item) {
		    $status = $item->status;
		    if ($item->status == 0) { $status = "danger"; };
		    if ($item->status == 1) { $status = "success"; };
		    if ($item->status == 0) { $status2 = Lang::get('admin.deactivated'); };
		    if ($item->status == 1) { $status2 = Lang::get('admin.active'); };
		    $id = $item->id;
		    $records["data"][] = array(
		      '<input type="checkbox" name="id[]" value="'.$id.'">',
		      $id,
		      $item->created_at->toDateTimeString(),
		      $item->title,
		      $item->language,
		      $item->user->name,
		      '<span class="label label-sm label-'.($status).'">'.($status2).'</span>',
		      '<a href="/admin/items/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','items');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.item'));
		View::share('languages', App\Languages::where('status', 1)->get());
		View::share('categories', App\Category::where('status', 1)->get());
		return Theme::view('admin.items.create');
	}

	public function store(itemsRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = new items($data);
		$db->save();

        if (Input::get('tags') !== NULL) {
            $tags = explode(',', Input::get('tags'));
            foreach($tags as $tag) {
	            $new_tag = App\Tags::firstOrCreate(array('tag' => $tag, 'user_id' => Auth::user()->id));
				$item_tag = new App\ItemTag;
				$item_tag->item_id = $db->id;
				$item_tag->tag_id = $new_tag->id;
				$item_tag->save();
            }
        }

	    return redirect('/admin/items')->with('message', Lang::get('admin.item').' '.Lang::get('admin.create_success'));
	}

	public function show($id) {
		View::share('active','items');
		Theme::setLayout('admin.app');
		$item = Items::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		View::share('languages', App\Languages::where('status', 1)->get());
		View::share('categories', App\Category::where('status', 1)->get());
		return Theme::view('admin.items.show');
	}

	public function update($id, itemsRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = Items::find($id);
		$db->update($data);

        if (Input::get('tags') !== NULL) {
            $tags = explode(',', Input::get('tags'));
        	App\ItemTag::where('item_id',$id)->delete();
            foreach($tags as $tag) {
	            $new_tag = App\Tags::firstOrCreate(array('tag' => $tag, 'user_id' => Auth::user()->id));
				$item_tag = new App\ItemTag;
				$item_tag->item_id = $db->id;
				$item_tag->tag_id = $new_tag->id;
				$item_tag->save();
            }
        }

	    return redirect('/admin/items')->with('message', Lang::get('admin.item').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Items::find($id);
			if (Request::input('customActionName') == "delete") {
	        	App\ItemTag::where('item_id',$id)->delete();
	        	App\ItemMedia::where('item_id',$id)->delete();
	        	App\Comments::where('item_id',$id)->delete();
				$db->delete();
			}
			if (Request::input('customActionName') == "activate") {
				$db->status = 1;
				$db->save();
			}
			if (Request::input('customActionName') == "deactivate") {
				$db->status = 0;
				$db->save();
			}
		}
	}

	public function categories() {

		$query = Input::get('term');
		$search = App\Category::where('title', 'LIKE', "%$query%")->select(array('id','title as text'))->take(10)->get();
		return json_encode($search);

	}

	public function tags() {

		$query = Input::get('term');
		$search = App\Tags::where('tag', 'LIKE', "%$query%")->select(array('id','tag as text'))->take(10)->get();
		return json_encode($search);

	}

}
