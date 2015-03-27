<?php

namespace WITR\ViewComposers;

use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;

class AuthViewComposer {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
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
			 ->with('authenticated', $this->auth->check());
	}
}