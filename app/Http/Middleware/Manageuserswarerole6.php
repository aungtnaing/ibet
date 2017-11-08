<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class Manageuserswarerole6 {

	
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}


	public function handle($request, Closure $next)
	{
		

		if ($request->user()->roleid==6 || $request->user()->roleid==1 || $request->user()->roleid==3)
		{

			return $next($request);
		
		}
		else
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('auth/login');
			}
			
		}

		
		// if ($request->user()->roleid>6 || $request->user()->roleid==0)
		// {	if ($request->ajax())
		// 	{
		// 		return response('Unauthorized.', 401);
		// 	}
		// 	else
		// 	{
		// 		return redirect()->guest('auth/login');
		// 	}
		// }


		
		return $next($request);
	}

}
