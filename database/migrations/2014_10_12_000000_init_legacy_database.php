<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitLegacyDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// DO NOT RUN ON PRODUCTION. DB ALREADY EXISTS
		if (App::environment('production'))
		{
		    return;
		}

		$sql = file_get_contents(dirname(__FILE__) . '/witr.sql');
		DB::unprepared($sql); 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}

}
