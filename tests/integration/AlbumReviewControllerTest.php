<?php

class AlbumReviewControllerTest extends IntegrationTestCase {

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/reviews')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/reviews')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/reviews')
            ->onPage('/admin/reviews');
            
		$this->beAdmin();
		$this->visit('/admin/reviews')
            ->onPage('/admin/reviews');
	}
}
