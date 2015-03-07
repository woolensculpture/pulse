<?php

use Illuminate\Database\Seeder;
use WITR\User;
use WITR\Show;
use WITR\TimeSlot;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ScheduleTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('schedule')->delete();
        $user = User::firstOrFail();
        $show = Show::firstOrFail();
        for ($day = 1; $day <= 7; $day++) 
        {
        	for ($hour = 1; $hour <= 24; $hour++)
        	{
        		$slot = new TimeSlot([
        			'show' => $show->id,
        			'dj' => $user->id,
        			'day' => $day,
        			'hour' => $hour
        		]);
        		$slot->save();
        	}
        }
    }

}