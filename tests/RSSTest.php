<?php

use WITR\RSS\Reader;
use WITR\RSS\BugJarParser;
use WITR\RSS\MensHockeyParser;
use WITR\RSS\WomensHockeyParser;

class RSSTest extends TestCase {

	/** @test */
	public function it_fetches_and_parses_bug_jar_events()
	{
		$reader = Reader::forParser(new BugJarParser);
		$data = $reader->get();
		$this->assertNotEquals($data->count(), 0);
	}

	/** @test */
	public function it_fetches_and_parses_mens_hockey_games()
	{
		$reader = Reader::forParser(new MensHockeyParser);
		$data = $reader->get();
		$this->assertNotEquals($data->count(), 0);
	}

	/** @test */
	public function it_fetches_and_parses_womens_hockey_games()
	{
		$reader = Reader::forParser(new WomensHockeyParser);
		$data = $reader->get();
		$this->assertNotEquals($data->count(), 0);
	}
}
