<?php

namespace WITR\TopTwenty;

use stdClass;

class DummyReader implements Reader {

	public function get()
	{
		return $this->getAmount(20);
	}

	public function getWeek()
	{
		return $this->getAmount(50);
	}

	private function getAmount($amount)
	{
		$songs = [];
		for ($i = 0; $i < $amount; $i++)
		{
			$song = new stdClass();
			$song->artist = 'Rage Against The Machine';
			$song->title = 'Bombtrack';
			$song->count = $amount - $i;
			$song->name = 'Feature';
			$songs[] = $song;
		}

		return $songs;	
	}
}