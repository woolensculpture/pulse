<?php

class ScheduleControllerTest extends IntegrationTestCase {

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/schedule')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/schedule')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/schedule')
            ->onPage('/admin/schedule');
            
        $this->beAdmin();
		$this->visit('/admin/schedule')
            ->onPage('/admin/schedule');
	}
}
