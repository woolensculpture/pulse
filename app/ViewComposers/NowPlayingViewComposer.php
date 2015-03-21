<?php

namespace WITR\ViewComposers;

use WITR\AlbumReview;
use Illuminate\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use stdClass;

class NowPlayingViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
        $client = new Client();
        try {
			$response = $client->get('http://logger.witr.rit.edu/latest.json', [
				'timeout' => 1,
			]);
			return $view->with('nowplaying', $response->json(['object' => true]));
		} catch (RequestException $e) {
			$data = new stdClass;
			$data->artist = '';
			$data->title = 'Not Available';
			return $view->with('nowplaying', $data);
		}
	}
}