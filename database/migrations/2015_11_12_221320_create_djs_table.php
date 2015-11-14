<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use WITR\User;
use WITR\DJ;

class CreateDjsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('djs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('picture');
			$table->timestamps();
		});	

		Eloquent::unguard();
		$users = User::all();
		foreach ($users as $user) {
			DJ::create([
				'id' => $user->id,
				'name' => $user->dj_name,
				'picture' => $user->picture,
			]);
		}

		Schema::table('user', function(Blueprint $table)
		{
			$table->dropColumn('dj_name');
			$table->dropColumn('picture');
			$table->dropColumn('active');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user', function(Blueprint $table)
		{
			$table->string('dj_name')->nullable();
			$table->string('picture')->default('default.jpg');
			$table->boolean('active')->default(false);
		});

		$djs = DJ::all();
		foreach ($djs as $dj) {
			$user = User::find($dj->id);
			if ($user != null)
			{
				$user->fill([
					'dj_name' => $dj->name,
					'picture' => $dj->picture,
					'active' => true
				]);
				$user->save();
			}
		}
		Schema::drop('djs');
	}

}
