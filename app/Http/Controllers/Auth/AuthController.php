<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use View;
use Theme;
use Lang;
use App;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	public function getLogin()
	{
		return Theme::view('admin/login_soft');
	}

	public function redirectPath()
	{
		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/'.Lang::getLocale().'';
	}
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
        $this->site_language = App\Languages::where('language',Lang::getLocale())->first();
        View::share('site_language', $this->site_language);
		View::share('title',Lang::get('site.login'));

		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
