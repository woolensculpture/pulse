<?php

class VideoControllerTest extends IntegrationTestCase {

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/videos')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/videos')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/videos')
            ->onPage('/admin/videos');
            
        $this->beAdmin();
		$this->visit('/admin/videos')
            ->onPage('/admin/videos');
	}
}
