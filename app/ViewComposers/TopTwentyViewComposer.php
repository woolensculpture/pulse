<?php

namespace WITR\ViewComposers;

use WITR\AlbumReview;
use WITR\TopTwenty\Reader;
use Illuminate\View\View;

class TopTwentyViewComposer {

	protected $reader;

	public function __construct(Reader $reader)
	{
		$this->reader = $reader;
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$data = $this->reader->get();
		$view->with('toptwenty', $data);
	}
}