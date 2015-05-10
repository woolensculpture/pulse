<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;
use Carbon\Carbon;

class AlbumReviewControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

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

	
	/** @test */
	public function it_creates_a_album_review()
	{
		$form = TestDummy::attributesFor('WITR\AlbumReview', [
			'img_name' => __DIR__ . '/files/review.jpg',
		]);

		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));

		$dbEntry = $form;
		$dbEntry['img_name'] = Carbon::now()->timestamp . '-review.jpg';

		$this->beEditor();
		$this->visit('/admin/reviews/create')
			->onPage('/admin/reviews/create')
			->submitForm('Save Review', $form)
			->andSee('Album Review Saved!')
			->onPage('/admin/reviews')
			->verifyInDatabase('album_reviews', $dbEntry)
			->seeFile(public_path() . '/img/albums/' . $dbEntry['img_name']);
	}

	/** @test */
	public function it_validates_a_album_review_create_request()
	{
		$form = TestDummy::attributesFor('WITR\AlbumReview', [
			'band_name' => '',
			'album_name' => '',
			'review' => '',
			'img_name' => '',
		]);

		$this->beEditor();
		$this->visit('/admin/reviews/create')
			->onPage('/admin/reviews/create')
			->submitForm('Save Review', $form)
			->andSee('The artist field is required')
			->andSee('The album field is required')
			->andSee('The review field is required')
			->andSee('The album cover is required')
			->onPage('/admin/reviews/create');
	}

	/** @test */
	public function it_edits_a_album_review()
	{
		$album = TestDummy::create('WITR\AlbumReview');
		$form = TestDummy::attributesFor('WITR\AlbumReview',[
			'band_name' => 'test band_name',
			'album_name' => 'test album',
			'review' => 'test review',
		]);

		$this->beEditor();
		$this->visit('/admin/reviews/' . $album->id)
			->onPage('/admin/reviews/' . $album->id)
			->submitForm('Update Review', $form)
			->andSee('Album Review Saved!')
			->onPage('/admin/reviews')
			->verifyInDatabase('album_reviews', $form);
	}


	/** @test */
	public function it_edits_a_album_review_with_an_album_cover()
	{
		$album = TestDummy::create('WITR\AlbumReview', [
			'img_name' => '01234-review.jpg'
		]);
		copy(__DIR__ . '/files/review.jpg', public_path() . '/img/albums/01234-review.jpg');
		$form = TestDummy::attributesFor('WITR\AlbumReview',[
			'band_name' => 'test band_name',
			'album_name' => 'test album',
			'review' => 'test review',
			'img_name' => __DIR__ . '/files/review.jpg',
		]);

		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));

		$dbEntry = $form;
		$dbEntry['img_name'] = Carbon::now()->timestamp . '-review.jpg';

		$this->beEditor();
		$this->visit('/admin/reviews/' . $album->id)
			->onPage('/admin/reviews/' . $album->id)
			->submitForm('Update Review', $form)
			->andSee('Album Review Saved!')
			->onPage('/admin/reviews')
			->verifyInDatabase('album_reviews', $dbEntry)
			->cannotSeeFile(public_path() . '/img/albums/' . $album->img_name)
			->seeFile(public_path() . '/img/albums/' . $dbEntry['img_name']);
	}

	/** @test */
	public function it_validates_a_album_review_edit_request()
	{
		$album = TestDummy::create('WITR\AlbumReview');
		$form = TestDummy::attributesFor('WITR\AlbumReview',[
			'band_name' => '',
			'album_name' => '',
			'review' => '',
			'img_name' => __DIR__ . '/files/test.html',
		]);

		$this->beEditor();
		$this->visit('/admin/reviews/' . $album->id)
			->onPage('/admin/reviews/' . $album->id)
			->submitForm('Update Review', $form)
			->andSee('The artist field is required')
			->andSee('The album field is required')
			->andSee('The review field is required')
			->andSee('The album cover should be an image')
			->onPage('/admin/reviews/' . $album->id);
	}

	/** @test */
	public function it_deletes_an_album_review_with_a_picture()
	{
		$album = TestDummy::create('WITR\AlbumReview', [
			'img_name' => '01234-review.jpg'
		]);
		copy(__DIR__ . '/files/review.jpg', public_path() . '/img/albums/01234-review.jpg');

		$this->beEditor();
		$this->visit('/admin/reviews/' . $album->id)
			->onPage('/admin/reviews/' . $album->id)
			->submitForm('Delete Review')
			->andSee('Album Review Deleted!')
			->onPage('/admin/reviews')
			->notSeeInDatabase('album_reviews', ['id' => $album->id])
			->cannotSeeFile(public_path() . '/img/albums/' . $album->img_name);	
	}
}
