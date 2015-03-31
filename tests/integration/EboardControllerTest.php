<?php

class EboardControllerTest extends IntegrationTestCase {

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/eboard')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/eboard')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/eboard')
            ->onPage('/admin/eboard');
            
        $this->beAdmin();
		$this->visit('/admin/eboard')
            ->onPage('/admin/eboard');
	}
}
