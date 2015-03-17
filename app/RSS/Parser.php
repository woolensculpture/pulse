<?php

namespace WITR\RSS;

interface Parser {

	public function parse($xml);

	public function url();
	
}