<?php

namespace WITR\ViewComposers;

use WITR\AlbumReview;
use Illuminate\View\View;

class AlbumsViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$albums = AlbumReview::orderBy('id', 'desc')->take(2)->get();
		$view->with('albums', $albums);
	}
}