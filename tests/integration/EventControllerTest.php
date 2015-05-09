<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;
use Carbon\Carbon;

class EventControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/events')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/events')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/events')
            ->onPage('/admin/events');
            
		$this->beAdmin();
		$this->visit('/admin/events')
            ->onPage('/admin/events');
	}

	/** @test */
	public function it_creates_an_event()
	{
		$form = TestDummy::attributesFor('WITR\Event', [
			'picture' => __DIR__ . '/files/event.jpg',
		]);

		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));

		$dbEntry = $form;
		$dbEntry['picture'] = Carbon::now()->timestamp . '-event.jpg';
		$dbEntry['date'] = new Carbon($dbEntry['date']);

		$this->beAdmin();
		$this->visit('/admin/events/create')
			->onPage('/admin/events/create')
			->submitForm('Save Event', $form)
			->andSee('Event Saved!')
			->onPage('/admin/events')
			->verifyInDatabase('events', $dbEntry)
			->seeFile(public_path() . '/img/events/' . $dbEntry['picture']);
	}

	/** @test */
	public function it_validates_a_create_request()
	{
		$form = TestDummy::attributesFor('WITR\Event', [
			'picture' => __DIR__ . '/files/non-event.jpg',
			'date' => ''
		]);

		$this->beAdmin();
		$this->visit('/admin/events/create')
			->onPage('/admin/events/create')
			->submitForm('Save Event', $form)
			->andSee('The date field is required')
			->andSee('The picture must be 670 pixels wide and 344 pixels tall')
			->onPage('/admin/events/create');
	}

	/** @test */
	public function it_updates_an_event()
	{
		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));
		$event = TestDummy::create('WITR\Event');
		$event->name = 'test event';
		$form = $event->toArray();
		unset($form['id']);

		$dbEntry = $form;
		$dbEntry['date'] = new Carbon($dbEntry['date']);

		$this->beAdmin();
		$this
			->visit('/admin/events/' . $event->id)
			->onPage('/admin/events/' . $event->id)
			->submitForm('Update Event', $form)
			->andSee('Event Saved!')
			->onPage('/admin/events')
			->verifyInDatabase('events', $dbEntry);
	}

	/** @test */
	public function it_updates_an_event_with_picture()
	{
		Carbon::setTestNow(Carbon::create(2014, 5, 21, 12));
		$event = TestDummy::create('WITR\Event', [
			'picture' => '01234-event.jpg'
		]);
		copy(__DIR__ . '/files/event.jpg', public_path() . '/img/events/01234-event.jpg');
		$form = $event->toArray();
		$form['picture'] = __DIR__ . '/files/event.jpg';
		unset($form['id']);

		$dbEntry = $form;
		$dbEntry['picture'] = Carbon::now()->timestamp . '-event.jpg';
		$dbEntry['date'] = new Carbon($dbEntry['date']);

		$this->beAdmin();
		$this
			->visit('/admin/events/' . $event->id)
			->onPage('/admin/events/' . $event->id)
			->submitForm('Update Event', $form)
			->andSee('Event Saved!')
			->onPage('/admin/events')
			->verifyInDatabase('events', $dbEntry)
			->cannotSeeFile(public_path() . '/img/events/' . $event->picture)
			->seeFile(public_path() . '/img/events/' . $dbEntry['picture']);
	}

	/** @test */
	public function it_validates_an_update_request()
	{
		$event = TestDummy::create('WITR\Event');
		$form = $event->toArray();
		$form['picture'] = __DIR__ . '/files/non-event.jpg';
		$form['date'] = '';
		unset($form['id']);

		$this->beAdmin();
		$this
			->visit('/admin/events/' . $event->id)
			->onPage('/admin/events/' . $event->id)
			->submitForm('Update Event', $form)
			->andSee('The date field is required')
			->andSee('The picture must be 670 pixels wide and 344 pixels tall')
			->onPage('/admin/events/' . $event->id);
	}
}
