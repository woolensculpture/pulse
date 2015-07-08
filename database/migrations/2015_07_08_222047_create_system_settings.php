<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use WITR\SystemSetting;

class CreateSystemSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_settings', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('label');
			$table->string('value');
			$table->timestamps();
		});	

		// Add initial system settings
		Eloquent::unguard();
		SystemSetting::create([
			'id' => SystemSetting::AskDestlerTextID, 
			'label' => 'Ask Destler Text',
			'value' => "We'll be asking Destler your questions on September 24th, at 5:00 PM on WITR 89.7"
		]);

		SystemSetting::create([
			'id' => SystemSetting::DJHoursFormLocationID, 
			'label' => 'DJ Hours Form Location',
			'value' => 'https://google.com/'
		]);

		SystemSetting::create([
			'id' => SystemSetting::CDSignoutFormLocationID, 
			'label' => 'CD Signout Form Location',
			'value' => 'https://google.com/'
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('system_settings');
	}

}
