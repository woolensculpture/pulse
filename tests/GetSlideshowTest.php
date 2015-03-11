<?php

use WITR\Commands\GetSlideshow;

class GetSlideshowTest extends TestCase {

	/** @test */
	public function it_should_get_four_slides()
	{
		$command = new GetSlideshow;
		$results = $command->handle();
		$this->assertEquals($results->count(), 4);
	}

}
