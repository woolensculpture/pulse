<?php

namespace WITR\ViewComposers;

use WITR\User;
use Illuminate\View\View;

class UsersViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('users', User::all());
	}
}