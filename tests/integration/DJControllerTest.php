<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;
use Carbon\Carbon;

class DJControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/djs')
            ->onPage('/home');

		$this->beEditor();
		$this->visit('/admin/djs')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/djs')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
        $this->beAdmin();
		$this->visit('/admin/djs')
            ->onPage('/admin/djs');
	}
	
	/** @test */
	public function it_creates_an_dj()
	{
		$form = TestDummy::attributesFor('WITR\DJ', [
			'picture' => __DIR__ . '/files/dj.jpg',
		]);
		unset($form['updated_at']);
		unset($form['created_at']);

		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));

		$dbEntry = $form;
		$dbEntry['picture'] = Carbon::now()->timestamp . '-dj.jpg';

		$this->beAdmin();
		$this->visit('/admin/djs/create')
			->onPage('/admin/djs/create')
			->submitForm('Save DJ', $form)
			->andSee('DJ Created!')
			->onPage('/admin/djs')
			->verifyInDatabase('djs', $dbEntry)
			->seeFile(public_path() . '/img/djs/' . $dbEntry['picture']);
	}

	/** @test */
	public function it_validates_a_create_request()
	{
		$form = TestDummy::attributesFor('WITR\DJ', [
			'picture' => __DIR__ . '/files/non-dj.pdf',
			'name' => ''
		]);
		unset($form['updated_at']);
		unset($form['created_at']);

		$this->beAdmin();
		$this->visit('/admin/djs/create')
			->onPage('/admin/djs/create')
			->submitForm('Save DJ', $form)
			->andSee('The name field is required')
			->andSee('The picture must be an image')
			->onPage('/admin/djs/create');
	}

	/** @test */
	public function it_updates_an_dj()
	{
		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));
		$dj = TestDummy::create('WITR\DJ');
		$dj->name = 'THIS VALUE HAS BEEN UPDATED';
		$form = $dj->toArray();
		unset($form['id']);
		unset($form['updated_at']);
		unset($form['created_at']);

		$dbEntry = $form;

		$this->beAdmin();
		$this
			->visit('/admin/djs/' . $dj->id)
			->onPage('/admin/djs/' . $dj->id)
			->submitForm('Update DJ', $form)
			->andSee('DJ Saved!')
			->onPage('/admin/djs')
			->verifyInDatabase('djs', $dbEntry);
	}

	/** @test */
	public function it_updates_an_dj_with_picture()
	{
		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));
		$dj = TestDummy::create('WITR\DJ', [
			'picture' => '01234-dj.jpg'
		]);
		copy(__DIR__ . '/files/dj.jpg', public_path() . '/img/djs/01234-dj.jpg');
		$form = $dj->toArray();
		$form['picture'] = __DIR__ . '/files/dj.jpg';
		unset($form['id']);
		unset($form['updated_at']);
		unset($form['created_at']);

		$dbEntry = $form;
		$dbEntry['picture'] = Carbon::now()->timestamp . '-dj.jpg';

		$this->beAdmin();
		$this
			->visit('/admin/djs/' . $dj->id)
			->onPage('/admin/djs/' . $dj->id)
			->submitForm('Update DJ', $form)
			->andSee('DJ Saved!')
			->onPage('/admin/djs')
			->verifyInDatabase('djs', $dbEntry)
			->cannotSeeFile(public_path() . '/img/djs/' . $dj->picture)
			->seeFile(public_path() . '/img/djs/' . $dbEntry['picture']);
	}

	/** @test */
	public function it_validates_an_update_request()
	{
		$dj = TestDummy::create('WITR\DJ');
		$form = $dj->toArray();
		$form['picture'] = __DIR__ . '/files/non-dj.pdf';
		$form['name'] = '';
		unset($form['id']);
		unset($form['updated_at']);
		unset($form['created_at']);

		$this->beAdmin();
		$this
			->visit('/admin/djs/' . $dj->id)
			->onPage('/admin/djs/' . $dj->id)
			->submitForm('Update DJ', $form)
			->andSee('The name field is required')
			->andSee('The picture must be an image')
			->onPage('/admin/djs/' . $dj->id);
	}

	/** @test */
	public function it_deletes_a_dj_with_a_picture()
	{
		$dj = TestDummy::create('WITR\DJ', [
			'picture' => '01234-dj.jpg'
		]);
		copy(__DIR__ . '/files/dj.jpg', public_path() . '/img/djs/01234-dj.jpg');

		$this->beAdmin();
		$this->visit('/admin/djs/' . $dj->id)
			->onPage('/admin/djs/' . $dj->id)
			->submitForm('Delete DJ')
			->andSee('DJ Deleted!')
			->onPage('/admin/djs')
			->notSeeInDatabase('djs', ['id' => $dj->id])
			->cannotSeeFile(public_path() . '/img/djs/' . $dj->picture);
	}


	/** @test */
	public function it_doesnt_delete_djs_on_the_schedule()
	{
		$dj = TestDummy::create('WITR\DJ');
		$timeslot = WITR\TimeSlot::first();
		$timeslot->dj = $dj->id;
		$timeslot->save();

		$this->beAdmin();
		$this->visit('/admin/djs/' . $dj->id)
			->onPage('/admin/djs/' . $dj->id)
			->submitForm('Delete DJ')
			->andSee('Remove DJ from schedule before deleting.')
			->onPage('/admin/djs/' . $dj->id);
	}
}
