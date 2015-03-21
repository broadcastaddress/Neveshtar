<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App;
use View;
use LaravelLocalization;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    protected $site_settings;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->site_settings = App\Category::select(array('title','slug'))->where('parent_id',null)->where('language',LaravelLocalization::getCurrentLocale())->get();
        View::share('navigation', $this->site_settings);
    }

}
