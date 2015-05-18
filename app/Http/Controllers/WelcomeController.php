<?php namespace App\Http\Controllers;

use Theme;
use View;
use Route;
use App;
use Lang;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

	public function index()
	{

		/*
		$items = App\Items::all();
		foreach ($items as $item) {
			$result = preg_replace('#<div id="pic_holder">(.*?)</div>#', ' ', $item->description);
		    $data['description'] = $result;
		    $db = App\Items::find($item->id);
			$db->update($data);
		}
		*/

		/*
		$items = App\ItemMedia::where('media_id','<',52312)->get();
		foreach($items as $item) {
				$find = App\News::find($item->media_id);
				if ($find) {
					$find_if_exists = App\Media::find($item->media_id);
					if(!$find_if_exists) {
						$db = new App\Media;
						$db->id = $item->media_id;
						$db->title = $find->title;
						$db->url = $find->url;
						$db->type = "img";
						$db->user_id = 1;
						$db->save();
					} else {
						echo "2";
					};
				} else {
					echo "1";
				};
		};
		*/

		/*
		$items = App\Items::where('language','en')->get();
		foreach($items as $item) {
		    $data['image_id'] = $item->image_id + 20000;
		    $db = App\Items::find($item->id);
		    if($db) {
				$db->update($data);
			};
		};
		*/

		/*
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 0);
		set_time_limit(0);

		if ($handle = opendir('uploads/images_pending/')) {
		    while (false !== ($filename = readdir($handle))) {
		        if($filename <> "." && $filename <> ".." && $filename <> ".DS_Store") {

					$sourcePath = 'uploads/images_pending/';
					$destinationPath = 'uploads/images_resized/';

					Image::make($sourcePath.$filename)->resize(1280, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath.'1_'.$filename, 90);

					Image::make($sourcePath.$filename)->resize(1024, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath.'2_'.$filename, 90);

					Image::make($sourcePath.$filename)->resize(840, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath.'3_'.$filename, 90);

					Image::make($sourcePath.$filename)->resize(400, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath.'4_'.$filename, 90);

					Image::make($sourcePath.$filename)->resize(200, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath.'5_'.$filename, 90);


					$destinationPath2 = 'uploads/images_cropped/';
					Image::make($destinationPath.'4_'.$filename)->crop(265, 199)->save($destinationPath2.'c_'.$filename);
					Image::make($destinationPath2.'c_'.$filename)->resize(265, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath2.'c_'.$filename, 95);

					Image::make($destinationPath2.'c_'.$filename)->resize(185, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath2.'c2_'.$filename, 99);

					Image::make($destinationPath2.'c2_'.$filename)->resize(85, null, function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->save($destinationPath2.'c3_'.$filename, 99);

		        };
		    }
		    closedir($handle);

		}
		*/

		Theme::setLayout('frontend.shop');
		$sliders = App\Sliders::where('language',Lang::getLocale())->where('status',1)->orderBy('id','DESC')->get();
		View::share('sliders',$sliders);

		View::share('title',$this->site_settings->site_slogan);
		return Theme::view('frontend/shop-index');

	}

}
