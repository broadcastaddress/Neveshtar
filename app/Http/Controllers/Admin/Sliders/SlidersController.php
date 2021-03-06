<?php namespace App\Http\Controllers\Admin\Sliders;

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

class SlidersController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','sliders');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.sliders'));
		View::share('items', Sliders::all()->take(10));
		View::share('items_total', Sliders::all()->count());
		return Theme::view('admin.sliders.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Sliders::all()->count();
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

		  $items = Sliders::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
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
		      '<a href="/admin/sliders/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','sliders');
		Theme::setLayout('admin.app');
		View::share('languages', App\Languages::where('status', 1)->get());
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.slider'));
		return Theme::view('admin.sliders.create');
	}

	public function store(slidersRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = new sliders($data);
		$db->save();

	    return redirect('/admin/sliders')->with('message', Lang::get('admin.slider').' '.Lang::get('admin.create_success'));
	}

	public function show($id) {
		View::share('active','sliders');
		Theme::setLayout('admin.app');
		$item = Sliders::find($id);
		View::share('languages', App\Languages::where('status', 1)->get());
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		return Theme::view('admin.sliders.show');
	}

	public function update($id, slidersRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = Sliders::find($id);
		$db->update($data);

	    return redirect('/admin/sliders')->with('message', Lang::get('admin.slider').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Sliders::find($id);
			if (Request::input('customActionName') == "delete") {
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

}
