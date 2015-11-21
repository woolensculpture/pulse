<?php 

namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests\Admin\User as Requests;
use WITR\Http\Controllers\Controller;
use WITR\User;
use WITR\Role;
use Input;
use File;
use Hash;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\PasswordBroker;

class UserController extends Controller {

	public function __construct(PasswordBroker $passwords)
	{
		$this->middleware('auth');
		$this->middleware('admin');

		$this->passwords = $passwords;
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
	public function create(Requests\CreateRequest $request)
	{
		$user = new User($request->all());
		$user->username = $request['email'];
		$user->password = '';
		$user->save();

        $response = $this->passwords->sendResetLink($request->only('email'), function($m)
		{
			$m->subject('Welcome to WITR!');
		});

		switch ($response)
		{
			case PasswordBroker::RESET_LINK_SENT:
				return redirect()->route('admin.users.index')
					->with('success', 'User Created!');
			case PasswordBroker::INVALID_USER:
				return redirect()->back()->with('error', trans($response));
		}
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

	public function update(Requests\UpdateRequest $request, $id)
	{
		$user = User::findOrFail($id);
		$user->fill($request->all());
		$user->username = $request['email'];
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
		return redirect()->route('admin.users.index')
			->with('success', 'User Deleted!');
	}

}
