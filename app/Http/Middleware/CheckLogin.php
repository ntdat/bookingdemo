<?php namespace App\Http\Middleware;

use Closure;
use Sentinel;

class CheckLogin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Sentinel::check())
		{

		}else{
			return redirect()->guest('auth/login');
		}
		return $next($request);

	}

}
