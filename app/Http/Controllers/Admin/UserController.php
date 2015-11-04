<?php 

namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\User;
use WITR\Role;
use Input;
use File;
use Hash;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the Users.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('name', 'asc')->get();
		return view('admin.users.index', ['users' => $users]);
	}

	public function new_user()
	{
		$roles = Role::lists('name', 'id');
		return view('admin.users.create', ['roles' => $roles]); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$input = Input::all();
		$user = new User($input);
		$user->password = Hash::make($input['password']);
		$user->username = $input['email'];

		if ($user->dj_name == '' || $user->dj_name == null)
		{
			$fullName = explode(' ', Input::input('name'));
			$firstName = $fullName[0];
			$user->dj_name = $firstName;
		}

		if(Input::hasFile('picture'))
		{
			$file = $input->file('picture');
			$user->uploadFile('picture', $file);
		}
		else
		{
			$user->picture = 'default.jpg';
		}

		$user->save();
		return redirect()->route('admin.users.index')
			->with('success', 'User Created!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roles = Role::lists('name', 'id');
		$user = User::findOrFail($id);

		return view('admin.users.edit', ['roles' => $roles, 'user' => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\UpdateRequest $request, $id)
	{
		$user = User::findOrFail($id);
		$user->fill($request->except(['picture']));

		if($request->hasFile('picture'))
		{
			$file = $request->file('picture');
			$user->uploadFile('picture', $file);
		}

		$user->save();
		return redirect()->route('admin.users.index')
			->with('success', 'User Saved!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$user = User::findOrFail($id);
		File::delete(public_path().'/img/djs/'.$user->picture);
		User::destroy($id);
		return view('admin.users.index')
		->with('success', 'User Deleted!');
	}

}
