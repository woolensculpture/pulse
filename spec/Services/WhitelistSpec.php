<?php

namespace spec\WITR\Services;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Http\Request;

class WhitelistSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('127.0.0.1', '127.0.0.1');
    }

    function it_should_deny_requests_that_are_out_of_range(Request $request)
    {
    	$request->getClientIp()->willReturn('192.168.1.1');
    	$this->inRange($request)->shouldBe(false);
    }

    function it_should_allow_requests_that_are_edge_of_range(Request $request)
    {
    	$request->getClientIp()->willReturn('127.0.0.1');
    	$this->inRange($request)->shouldBe(true);
    }

    function it_should_allow_requests_within_range(Request $request)
    {
        $this->beConstructedWith('127.0.0.1', '127.0.1.1');
    	$request->getClientIp()->willReturn('127.0.0.110');
    	$this->inRange($request)->shouldBe(true);
    }
}
