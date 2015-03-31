<?php

class ShowControllerTest extends IntegrationTestCase {

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/shows')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/shows')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/shows')
            ->onPage('/admin/shows');
            
        $this->beAdmin();
		$this->visit('/admin/shows')
            ->onPage('/admin/shows');
	}
}
