<?php

namespace WITR\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;
use WITR\Services\Whitelist;

class AuthViewComposer {

	protected $auth;
	protected $whitelist;
	protected $request;

	public function __construct(Guard $auth, Whitelist $whitelist, Request $request)
	{
		$this->auth = $auth;
		$this->whitelist = $whitelist;
		$this->request = $request;
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('user', $this->auth->user())
			 ->with('authenticated', $this->auth->check())
			 ->with('in_station', $this->whitelist->inRange($this->request));
	}
}