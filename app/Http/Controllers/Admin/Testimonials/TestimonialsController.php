<?php namespace App\Http\Controllers\Admin\Testimonials;

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

class TestimonialsController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','testimonials');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.testimonials'));
		View::share('items', Testimonials::all()->take(10));
		View::share('items_total', Testimonials::all()->count());
		return Theme::view('admin.testimonials.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Testimonials::all()->count();
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
				  $order = 'title';
				  break;
			  case '5':
				  $order = 'description';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $items = Testimonials::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
		  foreach($items as $item) {
		    $id = $item->id;
		    $records["data"][] = array(
		      '<input type="checkbox" name="id[]" value="'.$id.'">',
		      $id,
		      $item->created_at->toDateTimeString(),
		      $item->name,
		      $item->title,
		      $item->description,
		      '<a href="/admin/testimonials/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','testimonials');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.testimonial'));
		return Theme::view('admin.testimonials.create');
	}

	public function store(TestimonialsRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $db = new Testimonials($data);
	    $db->save();
	    return redirect('/admin/testimonials')->with('message', Lang::get('admin.testimonial').' '.Lang::get('admin.create_success'));
	}

	public function show($id) {
		View::share('active','testimonials');
		Theme::setLayout('admin.app');
		$item = Testimonials::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		return Theme::view('admin.testimonials.show');
	}

	public function update($id, TestimonialsRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $db = Testimonials::find($id);
		$db->update($data);
	    return redirect('/admin/testimonials')->with('message', Lang::get('admin.testimonial').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Testimonials::find($id);
				$testimonials = App\CategoriesTestimonial::where('testimonial_id',$id)->get();
			if (Request::input('customActionName') == "delete") {
				foreach($testimonials as $testimonial) {
					$testimonial->delete();
				};
				$db->delete();
			}
		}
	}

	public function testimonial() {

		$query = Input::get('term');
		$search = Testimonials::where('name', 'LIKE', "%$query%")->select(array('id','name as text'))->take(10)->get();
		return json_encode($search);

	}

}
