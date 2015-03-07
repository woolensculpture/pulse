<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('user')->delete();
        TestDummy::create('test_user');
        TestDummy::create('legacy_user');
    	TestDummy::times(20)->create('WITR\User');
    }

}