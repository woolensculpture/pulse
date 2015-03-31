<?php

class UserControllerTest extends IntegrationTestCase {

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
}
