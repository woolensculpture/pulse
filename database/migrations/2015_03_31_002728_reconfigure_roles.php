<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use WITR\User;
use WITR\Role;

class ReconfigureRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$users = User::all();
		$roles = Role::all();
		$normalRole = $roles->where('name', 'user')->first();
		$editorRole = $roles->where('name', 'admin')->first();
		$adminRole = $roles->where('name', 'super_admin')->first();

		$users->each(function ($user) use($normalRole, $editorRole, $adminRole) {
			if ($user->role->id != $normalRole->id && $user->role->id != $adminRole->id)
			{
				$user->role()->associate($editorRole);
				$user->save();
			}
		});

		$editorRole->name = 'editor';
		$editorRole->description = 'Content Editor';
		$editorRole->save();

		$adminRole->name = 'admin';
		$adminRole->description = 'Administrator';
		$adminRole->save();

		$ids = [$normalRole->id, $editorRole->id, $adminRole->id];
		DB::table('user_roles')
            ->whereNotIn('id', $ids)->delete();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
