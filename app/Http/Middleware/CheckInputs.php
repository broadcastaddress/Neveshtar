<?php namespace App\Http\Middleware;

use Closure;
use Input;

class CheckInputs {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        foreach ($request->input() as $name => $value) {
	        if (empty($value) && ($name !== 'status')) {
	        	Input::merge(array($name => null));
	        }
        }
		return $next($request);
	}

}
