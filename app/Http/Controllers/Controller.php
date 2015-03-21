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

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->site_settings = App\Navigation::tree();
        View::share('navigation', $this->site_settings);

    }

}
