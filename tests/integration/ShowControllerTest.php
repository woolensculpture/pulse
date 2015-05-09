<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;
use Carbon\Carbon;

class ShowControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

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
	
	/** @test */
	public function it_creates_an_show()
	{
		$form = TestDummy::attributesFor('WITR\Show', [
			'slider_picture' => __DIR__ . '/files/slider_picture.jpg',
			'show_picture' => __DIR__ . '/files/show_picture.jpg',
		]);

		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));

		unset($form['active']);
		$dbEntry = $form;
		$dbEntry['slider_picture'] = Carbon::now()->timestamp . '-slider_picture.jpg';
		$dbEntry['show_picture'] = Carbon::now()->timestamp . '-show_picture.jpg';

		$this->beAdmin();
		$this->visit('/admin/shows/create')
			->onPage('/admin/shows/create')
			->submitForm('Save Show', $form)
			->andSee('Show Saved!')
			->onPage('/admin/shows')
			->verifyInDatabase('shows', $dbEntry)
			->seeFile(public_path() . '/img/shows/' . $dbEntry['show_picture'])
			->seeFile(public_path() . '/img/slider/' . $dbEntry['slider_picture']);
	}

	/** @test */
	public function it_validates_a_create_request()
	{
		$form = TestDummy::attributesFor('WITR\Show', [
			'slider_picture' => __DIR__ . '/files/non-slider_picture.jpg',
			'show_picture' => __DIR__ . '/files/non-show_picture.jpg',
			'name' => ''
		]);
		unset($form['active']);

		$this->beAdmin();
		$this->visit('/admin/shows/create')
			->onPage('/admin/shows/create')
			->submitForm('Save Show', $form)
			->andSee('The name field is required')
			->andSee('The slider picture must be 670 pixels wide and 344 pixels tall')
			->andSee('The show picture must be 150 pixels wide and 150 pixels tall')
			->onPage('/admin/shows/create');
	}

	/** @test */
	public function it_updates_an_show()
	{
		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));
		$show = TestDummy::create('WITR\Show');
		$show->name = 'test show';
		$form = $show->toArray();
		unset($form['id']);
		unset($form['active']);

		$this->beAdmin();
		$this
			->visit('/admin/shows/' . $show->id)
			->onPage('/admin/shows/' . $show->id)
			->submitForm('Update Show', $form)
			->andSee('Show Saved!')
			->onPage('/admin/shows')
			->verifyInDatabase('shows', $form);
	}

	/** @test */
	public function it_updates_an_show_with_picture()
	{
		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));
		$show = TestDummy::create('WITR\Show', [
			'slider_picture' => '012345-slider_picture.jpg',
			'show_picture' => '012345-show_picture.jpg',
		]);
		copy(__DIR__ . '/files/slider_picture.jpg', public_path() . '/img/slider/01234-slider_picture.jpg');
		copy(__DIR__ . '/files/show_picture.jpg', public_path() . '/img/shows/01234-show_picture.jpg');
		$form = $show->toArray();
		$form['slider_picture'] = __DIR__ . '/files/slider_picture.jpg';
		$form['show_picture'] = __DIR__ . '/files/show_picture.jpg';
		unset($form['id']);
		unset($form['active']);

		$dbEntry = $form;
		$dbEntry['slider_picture'] = Carbon::now()->timestamp . '-slider_picture.jpg';
		$dbEntry['show_picture'] = Carbon::now()->timestamp . '-show_picture.jpg';

		$this->beAdmin();
		$this
			->visit('/admin/shows/' . $show->id)
			->onPage('/admin/shows/' . $show->id)
			->submitForm('Update Show', $form)
			->andSee('Show Saved!')
			->onPage('/admin/shows')
			->verifyInDatabase('shows', $dbEntry)
			->cannotSeeFile(public_path() . '/img/slider/' . $show->slider_picture)
			->cannotSeeFile(public_path() . '/img/shows/' . $show->show_picture)
			->seeFile(public_path() . '/img/slider/' . $dbEntry['slider_picture'])
			->seeFile(public_path() . '/img/shows/' . $dbEntry['show_picture']);
	}

	/** @test */
	public function it_validates_an_update_request()
	{
		$show = TestDummy::create('WITR\Show');
		$show->name = '';
		$show->slider_picture = __DIR__ . '/files/non-slider_picture.jpg';
		$show->show_picture = __DIR__ . '/files/non-show_picture.jpg';
		$form = $show->toArray();
		unset($form['id']);
		unset($form['active']);

		$this->beAdmin();
		$this
			->visit('/admin/shows/' . $show->id)
			->onPage('/admin/shows/' . $show->id)
			->submitForm('Update Show', $form)
			->andSee('The name field is required')
			->andSee('The slider picture must be 670 pixels wide and 344 pixels tall')
			->andSee('The show picture must be 150 pixels wide and 150 pixels tall')
			->onPage('/admin/shows/' . $show->id);
	}

	/** @test */
	public function it_deletes_a_show_with_a_picture()
	{
		$show = TestDummy::create('WITR\Show', [
			'slider_picture' => '012345-slider_picture.jpg',
			'show_picture' => '012345-show_picture.jpg',
		]);
		copy(__DIR__ . '/files/slider_picture.jpg', public_path() . '/img/slider/01234-slider_picture.jpg');
		copy(__DIR__ . '/files/show_picture.jpg', public_path() . '/img/shows/01234-show_picture.jpg');

		$this->beEditor();
		$this->visit('/admin/shows/' . $show->id)
			->onPage('/admin/shows/' . $show->id)
			->submitForm('Delete Show')
			->andSee('Show Deleted!')
			->onPage('/admin/shows')
			->notSeeInDatabase('shows', ['id' => $show->id])
			->cannotSeeFile(public_path() . '/img/shows/' . $show->show_picture)
			->cannotSeeFile(public_path() . '/img/slider/' . $show->slider_picture);
	}
}
