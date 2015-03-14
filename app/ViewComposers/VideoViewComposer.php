<?php

namespace WITR\ViewComposers;

use WITR\Video;
use Illuminate\View\View;

class VideoViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$video = Video::orderBy('timestamp', 'desc')->first();
		$view->with('video', $video);
	}
}