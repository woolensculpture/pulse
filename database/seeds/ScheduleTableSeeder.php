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
        $user = User::take(2)->get();
        $shows = Show::all();
        for ($day = 0; $day <= 6; $day++) 
        {
        	for ($hour = 1; $hour <= 24; $hour++)
        	{
                $idIndex = ($hour - 1) % 4 < 2 ? 0 : 1;
                $show = $shows->random();
        		$slot = new TimeSlot([
        			'show' => $show->id,
        			'dj' => $user[$idIndex]->id,
        			'day' => $day,
        			'hour' => $hour
        		]);
        		$slot->save();
        	}
        }
    }

}