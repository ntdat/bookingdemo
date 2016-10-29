<?php namespace App\Http\Middleware;

use Closure;
use Sentinel;
class CheckAccess {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if($user = Sentinel::check())
		{

			if ($user = Sentinel::getUser())
			{
				if (!$user->inRole('member'))
				{

				}else
				{
					return redirect()->route('template.index');
				}
			}


		}
		return $next($request);
	}

}
