<?php

namespace WITR\ViewComposers;

use WITR\Show;
use Illuminate\View\View;

class ShowsViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('shows', Show::all());
	}
}