<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class DJTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('djs')->truncate();
    	TestDummy::times(20)->create('WITR\DJ');
    }

}