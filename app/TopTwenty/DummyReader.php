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
			$song->count = $i;
			$song->name = 'Feature';
			$songs[] = $song;
		}

		return $songs;
	}

	public function getWeek()
	{
		for ($i = 0; $i < 50; $i++)
		{
			$song = new stdClass();
			$song->artist = 'Rage Against The Machine';
			$song->title = 'Bombtrack';
			$song->count = 50 - $i;
			$song->name = 'Feature';
			$songs[] = $song;
		}

		return $songs;
	}
}