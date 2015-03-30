<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('user')->delete();
        TestDummy::create('normal_user');
        TestDummy::create('editor_user');
        TestDummy::create('admin_user');
    	TestDummy::times(20)->create('WITR\User');
    }

}