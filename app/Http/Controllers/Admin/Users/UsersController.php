<?php namespace App\Http\Controllers\Admin\Users;

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
use Hash;

class UsersController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','users');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.users'));
		View::share('items', Users::all()->take(10));
		View::share('items_total', Users::all()->count());
		return Theme::view('admin.users.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Users::all()->count();
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
				  $order = 'name';
				  break;
			  case '4':
				  $order = 'email';
				  break;
			  case '5':
				  $order = 'status';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $items = Users::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
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
		      $item->name,
		      $item->email,
		      '<span class="label label-sm label-'.($status).'">'.($status2).'</span>',
		      '<a href="/admin/users/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','users');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.user'));
		return Theme::view('admin.users.create');
	}

	public function store(UsersRequest $request) {
		Input::merge(array('password' => Hash::make(Input::get('password'))));
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $db = new Users($data);
	    $db->save();
	    return redirect('/admin/users')->with('message', Lang::get('admin.user').' '.Lang::get('admin.create_success'));
	}

	public function show($id) {
		View::share('active','users');
		Theme::setLayout('admin.app');
		$item = Users::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		return Theme::view('admin.users.show');
	}

	public function update($id, UsersRequest $request) {
		$rules['email'] = "required|unique:users,email,{$id}";
		if(Input::get('password') !== NULL) {
			Input::merge(array('password' => Hash::make(Input::get('password'))));
			$data = Input::all();
		} else {
		    $data = Input::all();
		    array_forget($data, 'password');
		}
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $db = Users::find($id);
		$db->update($data);
	    return redirect('/admin/users')->with('message', Lang::get('admin.user').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Users::find($id);
				$staff = App\CategoriesUser::where('user_id',$id)->get();
			if (Request::input('customActionName') == "delete") {
				foreach($staff as $user) {
					$user->delete();
				};
				$db->delete();
			}
			if (Request::input('customActionName') == "activate") {
				$db->status = 1;
				$db->save();
			}
			if (Request::input('customActionName') == "deactivate") {
				foreach($staff as $user) {
					$user->delete();
				};
				$db->status = 0;
				$db->save();
			}
		}
	}

	public function staff() {

		$query = Input::get('term');
		$search = Users::where('name', 'LIKE', "%$query%")->select(array('id','name as text','profile_image'))->take(10)->get();
		return json_encode($search);

	}

}
