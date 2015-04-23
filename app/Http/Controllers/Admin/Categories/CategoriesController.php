<?php namespace App\Http\Controllers\Admin\Categories;

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

class CategoriesController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','categories');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.categories'));
		View::share('items', Categories::all()->take(10));
		View::share('items_total', Categories::all()->count());
		return Theme::view('admin.categories.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Categories::all()->count();
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
				  $order = 'order';
				  break;
			  case '6':
				  $order = 'status';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $items = Categories::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
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
		      '<a href="/admin/categories/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','categories');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.category'));
		View::share('languages', App\Languages::where('status', 1)->get());
		View::share('categories', App\Category::where('status', 1)->get());
		return Theme::view('admin.categories.create');
	}

	public function store(CategoriesRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = new Categories($data);
	    $db->save();

        if (Input::get('gallery') !== NULL) {
            $gallery = explode(',', Input::get('gallery'));
            foreach($gallery as $image) {
				$item_image = new App\CategoriesMedia;
				$item_image->category_id = $db->id;
				$item_image->media_id = $image;
				$item_image->save();
            }
        }

        if (Input::get('staff') !== NULL) {
            $staff = explode(',', Input::get('staff'));
            foreach($staff as $user) {
				$new_staff = new App\CategoriesUser;
				$new_staff->category_id = $db->id;
				$new_staff->user_id = $user;
				$new_staff->save();
            }
        }

        if (Input::get('testimonials') !== NULL) {
            $testimonials = explode(',', Input::get('testimonials'));
            foreach($testimonials as $testimonial) {
				$new_staff = new App\CategoriesTestimonial;
				$new_staff->category_id = $db->id;
				$new_staff->testimonial_id = $testimonial;
				$new_staff->save();
            }
        }


	    return redirect('/admin/categories')->with('message', Lang::get('admin.category').' '.Lang::get('admin.create_success'));
	}

	public function show($id) {
		View::share('active','categories');
		Theme::setLayout('admin.app');
		$item = Categories::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		View::share('languages', App\Languages::where('status', 1)->get());
		View::share('categories', App\Category::where('status', 1)->where('id','<>',$id)->get());
		return Theme::view('admin.categories.show');
	}

	public function update($id, CategoriesRequest $request) {
		$rules['slug'] = "required|unique:categories,slug,{$id}";
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $data['user_id'] = Auth::user()->id;
	    $db = Categories::find($id);
		$db->update($data);

    	App\CategoriesMedia::where('category_id',$id)->delete();
        if (Input::get('gallery') !== NULL) {
            $gallery = explode(',', Input::get('gallery'));
            foreach($gallery as $image) {
				$item_image = new App\CategoriesMedia;
				$item_image->category_id = $db->id;
				$item_image->media_id = $image;
				$item_image->save();
            }
        }

    	App\CategoriesUser::where('category_id',$id)->delete();
        if (Input::get('staff') !== NULL) {
            $staff = explode(',', Input::get('staff'));
            foreach($staff as $user) {
				$new_staff = new App\CategoriesUser;
				$new_staff->category_id = $db->id;
				$new_staff->user_id = $user;
				$new_staff->save();
            }
        }

    	App\CategoriesTestimonial::where('category_id',$id)->delete();
        if (Input::get('testimonials') !== NULL) {
            $testimonials = explode(',', Input::get('testimonials'));
            foreach($testimonials as $testimonial) {
				$new_staff = new App\CategoriesTestimonial;
				$new_staff->category_id = $db->id;
				$new_staff->testimonial_id = $testimonial;
				$new_staff->save();
            }
        }

	    return redirect('/admin/categories')->with('message', Lang::get('admin.category').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = Categories::find($id);
				$items = App\Items::where('category_id',$id)->get();
			if (Request::input('customActionName') == "delete") {
				$media = App\CategoriesMedia::where('category_id',$id)->delete();
				$media = App\CategoriesUser::where('category_id',$id)->delete();
				$media = App\CategoriesTestimonial::where('category_id',$id)->delete();
				foreach($items as $item) {
					$item->status = 0;
					$item->save();
				};
				$db->delete();
			}
			if (Request::input('customActionName') == "activate") {
				foreach($items as $item) {
					$item->status = 1;
					$item->save();
				};
				$db->status = 1;
				$db->save();
			}
			if (Request::input('customActionName') == "deactivate") {
				foreach($items as $item) {
					$item->status = 0;
					$item->save();
				};
				$db->status = 0;
				$db->save();
			}
		}
	}

}
