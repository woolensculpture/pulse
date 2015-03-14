<?php

namespace spec\WITR\Slideshow;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use WITR\Schedule\ScheduledShow;
use WITR\Event;
use Illuminate\Support\Collection;

class SlidesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WITR\Slideshow\Slides');
    }

    function it_should_add_shows_as_slides(ScheduledShow $show1, ScheduledShow $show2, ScheduledShow $show3, ScheduledShow $show4)
    {
    	$shows = new Collection([$show1, $show2, $show3, $show4]);
    	$this->beConstructedThrough('forShows', [$shows]);
    	$this->shouldHaveCount(4);
    	$this->first()->shouldHaveType('WITR\Slideshow\Slide');
    	$this->first()->type()->shouldBe('SHOW');
    	$this->first()->displayIndex()->shouldBe('first');
    	$this[1]->displayIndex()->shouldBe('second');
    	$this[2]->displayIndex()->shouldBe('third');
    	$this->last()->displayIndex()->shouldBe('fourth');
    }

    function it_should_replace_a_show_with_an_event_slide(ScheduledShow $show1, ScheduledShow $show2, ScheduledShow $show3, ScheduledShow $show4, Event $event)
    {
    	$shows = new Collection([$show1, $show2, $show3, $show4]);
    	$this->beConstructedThrough('forShows', [$shows]);
    	$this->shouldHaveCount(4);
    	$this->addEvent($event);
    	$this->shouldHaveCount(4);
    	$this->first()->shouldHaveType('WITR\Slideshow\Slide');
    	$this->first()->type()->shouldBe('EVENT');
    	$this->first()->displayIndex()->shouldBe('first');
    	$this[1]->displayIndex()->shouldBe('second');
    	$this[2]->displayIndex()->shouldBe('third');
    	$this->last()->displayIndex()->shouldBe('fourth');
    }
}
