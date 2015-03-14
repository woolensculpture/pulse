<?php

namespace WITR\TopTwenty;

class SQLReader implements Reader {

	public function get()
	{
		$toptwenty = DB::connection('logger')->table('top_20')->get();
		return $toptwenty;
	}
}