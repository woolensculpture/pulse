<?php

namespace WITR\ViewComposers;

use WITR\DJ;
use Illuminate\View\View;

class DJsViewComposer {

    protected $djs;

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
    {
        if ($this->djs == null) {
            $this->djs = DJ::orderBy('name', 'asc')->get();
        }
		$view->with('djs', $this->djs);
	}
}
