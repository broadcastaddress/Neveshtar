<?php namespace App\Http\Controllers\Admin\Feedbacks;

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

class FeedbacksController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','feedbacks');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.feedbacks'));
		View::share('items', Feedbacks::all()->take(10));
		View::share('items_total', Feedbacks::all()->count());
		return Theme::view('admin.feedbacks.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Feedbacks::all()->count();
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
				  $order = 'message';
				  break;
			  case '4':
				  $order = 'email';
				  break;
			  case '5':
				  $order = 'name';
				  break;
			  case '6':
				  $order = 'status';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $comments = Feedbacks::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
		  foreach($comments as $comment) {
		    $status = $comment->status;
		    if ($comment->status == 0) { $status = "danger"; };
		    if ($comment->status == 1) { $status = "success"; };
		    if ($comment->status == 0) { $status2 = Lang::get('admin.unread'); };
		    if ($comment->status == 1) { $status2 = Lang::get('admin.read'); };
		    $id = $comment->id;
		    $records["data"][] = array(
		      '<input type="checkbox" name="id[]" value="'.$id.'">',
		      $id,
		      $comment->created_at->toDateTimeString(),
		      $comment->message,
		      $comment->email,
		      $comment->name,
		      '<span class="label label-sm label-'.($status).'">'.($status2).'</span>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Feedbacks::find($id);
			if (Request::input('customActionName') == "delete") {
				$db->delete();
			}
			if (Request::input('customActionName') == "read") {
				$db->status = 1;
				$db->save();
			}
			if (Request::input('customActionName') == "unread") {
				$db->status = 0;
				$db->save();
			}
		}
	}

}
