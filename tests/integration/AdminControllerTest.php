<?php

use WITR\User;

class AdminControllerTest extends IntegrationTestCase {

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$user = new User(['email' => 'normal@example.com', 'user_role' => 1]);
		$this->be($user);
		$this->visit('/admin')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$user = new User(['email' => 'normal@example.com', 'user_role' => 3]);
		$this->be($user);
		$this->visit('/admin')
            ->onPage('/admin');
	}
}
