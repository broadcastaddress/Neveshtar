<?php namespace App\Http\Controllers\Admin\Images;

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
use Image;

class ImagesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('checkInputs');
	}

	public function index() {
		View::share('active','images');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.images'));
		View::share('items', images::all()->take(10));
		View::share('items_total', images::all()->count());
		return Theme::view('admin.images.index');
	}

	public function ajax_table() {

		  $iTotalRecords = images::all()->count();
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
				  $order = 'type';
				  break;
			  case '5':
				  $order = 'owner';
				  break;
			  case '6':
				  $order = 'status';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $items = images::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
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
		      $item->order,
		      '<span class="label label-sm label-'.($status).'">'.($status2).'</span>',
		      '<a href="/admin/images/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','images');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.image'));
		return Theme::view('admin.images.create');
	}

	public function store(imagesRequest $request) {

		$title = Input::get('title');
		$file = Input::file('file');

		$filename = rand(1000,9999).time().substr($file->getClientOriginalName(), -4);

		// Manual crop & save
		$destinationPath = 'precrop/';
		Input::file('file')->move($destinationPath, $filename);

		$img = Image::make($destinationPath.$filename);
		if(Input::get('watermark') == 1) {
			$img->insert('themes/'.Theme::getActive().'/assets/logo.png', 'bottom-left', 20, 20);
		};
		$img->save($destinationPath.$filename);

		if(Input::get('watermark') == 1) {
			Image::make($destinationPath.$filename)->resize(1024, null, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
				$constraint->insert('themes/'.Theme::getActive().'/assets/logo.png', 'bottom-left', 20, 20);
			})->save($destinationPath.'1_'.$filename, 90);
		} else {
			Image::make($destinationPath.$filename)->resize(1024, null, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			})->save($destinationPath.'1_'.$filename, 90);
		};

		Image::make($destinationPath.$filename)->resize(640, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'2_'.$filename, 90);

		Image::make($destinationPath.$filename)->resize(320, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'3_'.$filename, 90);

		Image::make($destinationPath.$filename)->resize(200, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'4_'.$filename, 90);

		$resized = '2_'.$filename;

		View::share('resized', $resized);
		View::share('title', $title);
		View::share('filename', $filename);
		return Theme::view('admin.images.crop');
		// End manual crop & save

	}

	public function show($id) {
		View::share('active','images');
		Theme::setLayout('admin.app');
		$item = images::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		return Theme::view('admin.images.show');
	}

	public function update($id, imagesRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = images::find($id);
		$db->update($data);
	    return redirect('/admin/images')->with('message', Lang::get('admin.image').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = images::find($id);
				$items = App\Items::where('image_id',$id)->get();
			if (Request::input('customActionName') == "delete") {
				foreach($items as $item) {
					$item->image_id = null;
					$item->save();
				};
				$db->delete();
			}
		}
	}

}
