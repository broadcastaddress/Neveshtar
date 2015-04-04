<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App;
use View;
use Lang;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    protected $site_settings;
    protected $photos_stream;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->site_settings = App\Navigation::tree();
        View::share('navigation', $this->site_settings);
		$this->photos_stream = App\Items::where('status',1)->where('image_id','<>','null')->where('language',Lang::getLocale())->orderBy('id','desc')->groupBy('image_id')->take(15)->get();
		View::share('footer_photos_stream',$this->photos_stream);
    }

}
