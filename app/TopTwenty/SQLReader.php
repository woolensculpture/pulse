<?php

namespace WITR\TopTwenty;
use DB;

class SQLReader implements Reader {

	public function get()
	{
		$toptwenty = DB::connection('logger')->table('top_20')->get();
		return $toptwenty;
	}

	public function getWeek()
	{
		$toptwenty = DB::connection('logger')->table('top_week')->get();
		return $toptwenty;
	}
}