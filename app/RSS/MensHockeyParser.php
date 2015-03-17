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
		var_dump($xml);
  		$event = new stdClass;
  		$event->name = $xml->title;
  		$event->date = Carbon::createFromFormat('D, d M Y H:i:s O', $xml->pubDate);
  		$event->picture = 'bugjar.jpg';
  		$event->url = $xml->link;
		return $event;
	}
}