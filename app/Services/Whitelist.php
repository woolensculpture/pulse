<?php namespace WITR\Services;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Whitelist {

	protected $fromIp;
	protected $toIp;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct($fromIp, $toIp)
	{
		$this->fromIp = $fromIp;
		$this->toIp = $toIp;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function inRange($request)
	{
		$ip = $request->getClientIp();
		if( (ip2long($this->fromIp) <= ip2long($ip)) && (ip2long($ip) <= ip2long($this->toIp))) {
			return true;
		} else {
			return false;
		}
	}

}
