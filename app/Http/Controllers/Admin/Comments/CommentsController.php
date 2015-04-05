<?php namespace App\Http\Controllers\Admin\Comments;

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

class CommentsController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','comments');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.comments'));
		View::share('items', Comments::all()->take(10));
		View::share('items_total', Comments::all()->count());
		return Theme::view('admin.comments.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Comments::all()->count();
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
				  $order = 'description';
				  break;
			  case '4':
				  $order = 'item_id';
				  break;
			  case '5':
				  $order = 'user_id';
				  break;
			  case '6':
				  $order = 'status';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $comments = Comments::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
		  foreach($comments as $comment) {
		    $status = $comment->status;
		    if ($comment->status == 0) { $status = "danger"; };
		    if ($comment->status == 1) { $status = "success"; };
		    if ($comment->status == 0) { $status2 = Lang::get('admin.deactivated'); };
		    if ($comment->status == 1) { $status2 = Lang::get('admin.active'); };
		    $id = $comment->id;
		    $records["data"][] = array(
		      '<input type="checkbox" name="id[]" value="'.$id.'">',
		      $id,
		      $comment->created_at->toDateTimeString(),
		      $comment->description,
		      '<a href="/'.$comment->item->language.'/'.$comment->item->slug.'" target="_blank">'.$comment->item->title.'</a>',
		      $comment->user->name,
		      '<span class="label label-sm label-'.($status).'">'.($status2).'</span>',
		      '<a href="/admin/Comments/'.$comment->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Comments::find($id);
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
