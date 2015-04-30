<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth {

	public function handle($request, Closure $next)
	{

		if (!Auth::user()) {
			return redirect()->guest('auth/login');
		};
		if (!(Auth::user()->status == 1)) {
			return redirect()->guest('auth/login');
		};
		if (!(Auth::user()->type == "admin")) {
			return redirect()->guest('auth/login');
		};

		return $next($request);

	}

}
