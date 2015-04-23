<?php namespace App\Http\Controllers\Admin\Settings;

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

class SettingsController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','settings');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.settings'));
		View::share('items', Settings::orderBy('language','asc')->get());
		return Theme::view('admin.settings.index');
	}

	public function show($id) {
		View::share('active','settings');
		Theme::setLayout('admin.app');
		$item = Settings::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->language.'');
		return Theme::view('admin.settings.show');
	}

	public function update($id, settingsRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    array_forget($data, '_wysihtml5_mode');
	    $db = Settings::find($id);
		$db->update($data);

	    return redirect('/admin/settings')->with('message', Lang::get('admin.setting').' '.Lang::get('admin.update_success'));
	}

}
