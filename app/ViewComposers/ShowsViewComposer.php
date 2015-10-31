<?php

namespace WITR\ViewComposers;

use WITR\Show;
use Illuminate\View\View;

class ShowsViewComposer {
	
	protected $shows;

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		if ($this->shows == null) {
			$this->shows = Show::all();
		}
		$view->with('shows', $this->shows);
	}
}
