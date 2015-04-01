<?php namespace WITR\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use WITR\Services\Whitelist;

class VerifyAuthOrWhitelisted {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * The Whitelist implementation.
	 *
	 * @var Whitelist
	 */
	protected $whitelist;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth, Whitelist $whitelist)
	{
		$this->auth = $auth;
		$this->whitelist = $whitelist;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest() && !$this->whitelist->inRange($request))
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

		return $next($request);
	}

}
