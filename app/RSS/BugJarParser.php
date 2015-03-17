<?php

namespace WITR\RSS;

use Carbon\Carbon;
use stdClass;

class BugJarParser implements Parser {
	
	public function url()
	{
		return 'http://bugjar.com/wp-content/plugins/gigs-calendar/rss.php';
	}

	public function parse($xml)
	{
  		$event = new stdClass;
  		$event->name = $xml->title;
  		$event->date = Carbon::createFromFormat('D, d M Y H:i:s O', $xml->pubDate);
  		$event->picture = 'bugjar.jpg';
  		$event->url = $xml->link;
		return $event;
	}
}