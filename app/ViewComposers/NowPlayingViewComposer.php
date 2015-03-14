<?php

namespace WITR\ViewComposers;

use WITR\AlbumReview;
use Illuminate\View\View;

class NowPlayingViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$data = file_get_contents('http://logger.witr.rit.edu/latest.json');
	    $json = json_decode($data);
		$view->with('nowplaying', $json);
	}
}