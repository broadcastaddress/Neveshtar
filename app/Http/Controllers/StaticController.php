<?php namespace App\Http\Controllers;

use Theme;
use View;
use Route;
use Lang;
use App;

class StaticController extends Controller {

	public function privacy_policy()
	{
		Theme::setLayout('frontend.app');
		View::share('title',Lang::get('site.privacy_policy'));
		$item = $this->site_settings->privacy_policy;
		View::share('item',$item);
		return Theme::view('frontend/static_pages');
	}

	public function terms_of_service()
	{
		Theme::setLayout('frontend.app');
		View::share('title',Lang::get('site.terms_of_service'));
		$item = $this->site_settings->terms_of_service;
		View::share('item',$item);
		return Theme::view('frontend/static_pages');
	}

}
