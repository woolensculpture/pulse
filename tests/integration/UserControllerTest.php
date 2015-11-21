<?php

use \Mockery as m;
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class UserControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/users')
            ->onPage('/home');

		$this->beEditor();
		$this->visit('/admin/users')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/users')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
        $this->beAdmin();
		$this->visit('/admin/users')
            ->onPage('/admin/users');
	}
	
	/** @test */
	public function it_creates_a_user()
	{
		$mock = m::mock('Illuminate\Contracts\Auth\PasswordBroker');
		$mock->shouldReceive('sendResetLink')->andReturn(\Illuminate\Contracts\Auth\PasswordBroker::RESET_LINK_SENT);
		$this->app->instance('Illuminate\Contracts\Auth\PasswordBroker', $mock);
		$form = ['name' => 'Test Name', 'email' => 'test@example.com'];

		$this->beAdmin();
		$this->visit('/admin/users/create')
			->onPage('/admin/users/create')
			->submitForm('Save User', $form)
			->andSee('User Created!')
			->onPage('/admin/users')
			->verifyInDatabase('user', $form);
	}

	/** @test */
	public function it_validates_a_create_request()
	{
		$form = [
			'name' => '',
			'email' => 'asdf',
		];

		$this->beAdmin();
		$this->visit('/admin/users/create')
			->onPage('/admin/users/create')
			->submitForm('Save User', $form)
			->andSee('The name field is required')
			->andSee('The email must be a valid email address')
			->onPage('/admin/users/create');
	}

	/** @test */
	public function it_updates_a_user()
	{
		$user = TestDummy::create('WITR\User');
		$form = ['name' => 'THIS UPDATED VALUE', 'email' => 'test@example.com'];

		$this->beAdmin();
		$this->visit('/admin/users/' . $user->id)
			->onPage('/admin/users/' . $user->id)
			->submitForm('Update User', $form)
			->andSee('User Saved!')
			->onPage('/admin/users')
			->verifyInDatabase('user', $form);
	}

	/** @test */
	public function it_validates_an_update_request()
	{
		$user = TestDummy::create('WITR\User');
		$form = [
			'name' => '',
			'email' => 'asdfasdf',
		];

		$this->beAdmin();
		$this->visit('/admin/users/' . $user->id)
			->onPage('/admin/users/' . $user->id)
			->submitForm('Update User', $form)
			->andSee('The name field is required')
			->andSee('The email must be a valid email address')
			->onPage('/admin/users/' . $user->id);
	}

	/** @test */
	public function it_deletes_a_user()
	{
		$user = TestDummy::create('WITR\User');

		$this->beAdmin();
		$this->visit('/admin/users/' . $user->id)
			->onPage('/admin/users/' . $user->id)
			->submitForm('Delete User')
			->andSee('User Deleted!')
			->onPage('/admin/users')
			->notSeeInDatabase('user', ['id' => $user->id]);	
	}
}
