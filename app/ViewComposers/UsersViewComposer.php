<?php

namespace WITR\ViewComposers;

use WITR\User;
use Illuminate\View\View;

class UsersViewComposer {

    protected $users;

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
    {
        if ($this->users == null) {
            $this->users = User::orderBy('dj_name', 'asc')->get();
        }
		$view->with('users', $this->users);
	}
}
