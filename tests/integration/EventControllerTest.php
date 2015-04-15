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

		$dbEntry = $form;
		$dbEntry['picture'] = 'event.jpg';
		$dbEntry['date'] = new Carbon($dbEntry['date']);

		$this->beAdmin();
		$this->visit('/admin/events/create')
			->onPage('/admin/events/create')
			->submitForm('Save Event', $form)
			->andSee('Event Saved!')
			->onPage('/admin/events')
			->verifyInDatabase('events', $dbEntry)
			->seeFile(public_path() . '/img/events/event.jpg');

	}
}
