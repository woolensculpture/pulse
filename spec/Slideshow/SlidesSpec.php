<?php

namespace spec\WITR\Slideshow;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SlidesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WITR\Slideshow\Slides');
    }
}
