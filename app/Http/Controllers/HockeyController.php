<?php namespace WITR\Http\Controllers;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\RSS\Reader;
use WITR\RSS\WomensHockeyParser;
use WITR\RSS\MensHockeyParser;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HockeyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$women = $this->getNextGame(new WomensHockeyParser);
		$men = $this->getNextGame(new MensHockeyParser);
		return view('hockey.hockey', ['women' => $women, 'men' => $men]);
	}

	private function getNextGame($parser)
	{
		$reader = Reader::forParser($parser);
		$games = $reader->get()->sortBy(function($game) {
			return $game->startUtc->timestamp;
		});
		$laterGames = $games->filter(function ($game) {
			return $game->startUtc > Carbon::now('UTC');
		});

		if ($laterGames->isEmpty())
		{
			return $games->last();
		}

		return $laterGames->first();
	}
}
