<?php

namespace WITR\RSS;

use Carbon\Carbon;
use stdClass;

class MensHockeyParser implements Parser {
	
	public function url()
	{
		return 'http://www.ritathletics.com/calendar.ashx/calendar.rss?sport_id=9';
	}

	public function parse($xml)
	{
		$homeGame = strpos($xml->title, ' vs ') !== FALSE;
		$opponent = substr($xml->title, strpos($xml->title, $homeGame ? 'vs' : 'at') + 2);

  		$event = new stdClass;
  		$event->opponent = trim($opponent);
  		$event->isHome = $homeGame;
  		$event->startUtc = Carbon::parse($xml->{'ev:startdate'});
  		$event->start = Carbon::parse($xml->{'s:localstartdate'});
  		$event->url = $xml->link;
		return $event;
	}
}