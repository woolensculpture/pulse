<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class VideoControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

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

	/** @test */
	public function it_creates_a_video_review()
	{
		$form = TestDummy::attributesFor('WITR\Video');

		$this->beEditor();
		$this->visit('/admin/videos/create')
			->onPage('/admin/videos/create')
			->submitForm('Save Review', $form)
			->andSee('Video Review Saved!')
			->onPage('/admin/videos')
			->verifyInDatabase('videos', $form);
	}

	/** @test */
	public function it_validates_a_video_review_create_request()
	{
		$form = TestDummy::attributesFor('WITR\Video', [
			'artist' => ''
		]);

		$this->beEditor();
		$this->visit('/admin/videos/create')
			->onPage('/admin/videos/create')
			->submitForm('Save Review', $form)
			->andSee('The artist field is required')
			->onPage('/admin/videos/create');
	}

	/** @test */
	public function it_edits_a_video_review()
	{
		$video = TestDummy::create('WITR\Video');
		$video->song = 'test song';
		$form = $video->toArray();
		unset($form['id']);

		$this->beEditor();
		$this->visit('/admin/videos/' . $video->id)
			->onPage('/admin/videos/' . $video->id)
			->submitForm('Update Review', $form)
			->andSee('Video Review Saved!')
			->onPage('/admin/videos')
			->verifyInDatabase('videos', $form);
	}

	/** @test */
	public function it_validates_a_video_review_edit_request()
	{
		$video = TestDummy::create('WITR\Video');
		$video->song = '';
		$form = $video->toArray();
		unset($form['id']);

		$this->beEditor();
		$this->visit('/admin/videos/' . $video->id)
			->onPage('/admin/videos/' . $video->id)
			->submitForm('Update Review', $form)
			->andSee('The song field is required')
			->onPage('/admin/videos/' . $video->id);
	}
}
