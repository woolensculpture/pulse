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
		$form = TestDummy::attributesFor('WITR\Video', [
			'url_tag' => 'https://www.youtube.com/watch?v=ZTidn2dBYbY'
		]);

		$dbEntry = $form;
		$dbEntry['url_tag'] = 'ZTidn2dBYbY';

		$this->beEditor();
		$this->visit('/admin/videos/create')
			->onPage('/admin/videos/create')
			->submitForm('Save Review', $form)
			->andSee('Video Review Saved!')
			->onPage('/admin/videos')
			->verifyInDatabase('videos', $dbEntry);
	}

	/** @test */
	public function it_validates_a_video_review_create_request()
	{
		$form = TestDummy::attributesFor('WITR\Video', [
			'artist' => '',
			'song' => '',
			'album' => '',
			'review' => '',
			'url_tag' => '',
		]);

		$this->beEditor();
		$this->visit('/admin/videos/create')
			->onPage('/admin/videos/create')
			->submitForm('Save Review', $form)
			->andSee('The artist field is required')
			->andSee('The song field is required')
			->andSee('The album field is required')
			->andSee('The review field is required')
			->andSee('The YouTube URL is required')
			->onPage('/admin/videos/create');
	}

	/** @test */
	public function it_edits_a_video_review()
	{
		$video = TestDummy::create('WITR\Video');
		$video->song = 'test song';
		$video->artist = 'test artist';
		$video->album = 'test album';
		$video->review = 'test review';
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
		$video->artist = '';
		$video->album = '';
		$video->review = '';
		$video->url_tag = '';
		$form = $video->toArray();
		unset($form['id']);

		$this->beEditor();
		$this->visit('/admin/videos/' . $video->id)
			->onPage('/admin/videos/' . $video->id)
			->submitForm('Update Review', $form)
			->andSee('The song field is required')
			->andSee('The artist field is required')
			->andSee('The album field is required')
			->andSee('The review field is required')
			->andSee('The YouTube URL is required')
			->onPage('/admin/videos/' . $video->id);
	}

	/** @test */
	public function it_deletes_a_video_review()
	{
		$video = TestDummy::create('WITR\Video');

		$this->beEditor();
		$this->visit('/admin/videos/' . $video->id)
			->onPage('/admin/videos/' . $video->id)
			->submitForm('Delete Review')
			->andSee('Video Review Deleted!')
			->onPage('/admin/videos')
			->notSeeInDatabase('videos', ['id' => $video->id]);
	}
}
