<?php

namespace WITR\TopTwenty;

use stdClass;

class DummyReader implements Reader {

	public function get()
	{
		for ($i = 0; $i < 20; $i++)
		{
			$song = new stdClass();
			$song->artist = 'Rage Against The Machine';
			$song->title = 'Bombtrack';
			$songs[] = $song;
		}

		return $songs;
	}
}