<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class EboardControllerTest extends IntegrationTestCase {

	use DatabaseTransactions;

	/** @test */
	public function it_denies_unauthorized_access()
	{
		$this->beUser();
		$this->visit('/admin/eboard')
            ->onPage('/home');
	}

	/** @test */
	public function it_redirects_guests()
	{
		$this->visit('/admin/eboard')
            ->onPage('/auth/login');
	}

	/** @test */
	public function it_allows_authorized_access()
	{
		$this->beEditor();
		$this->visit('/admin/eboard')
            ->onPage('/admin/eboard');
            
        $this->beAdmin();
		$this->visit('/admin/eboard')
            ->onPage('/admin/eboard');
	}

	/** @test */
	public function it_creates_an_eboard_position()
	{
		$form = TestDummy::attributesFor('WITR\Eboard');

		$this->beAdmin();
		$this->visit('/admin/eboard/create')
			->onPage('/admin/eboard/create')
			->submitForm('Save Position', $form)
			->andSee('Position Saved!')
			->onPage('/admin/eboard')
			->verifyInDatabase('eboard', $form);
	}

	/** @test */
	public function it_validates_a_create_request()
	{
		$form = TestDummy::attributesFor('WITR\Eboard', [
			'position' => '',
		]);

		$this->beAdmin();
		$this->visit('/admin/eboard/create')
			->onPage('/admin/eboard/create')
			->submitForm('Save Position', $form)
			->andSee('The position field is required')
			->onPage('/admin/eboard/create');
	}

	/** @test */
	public function it_edits_an_eboard_position()
	{
		$eboard = TestDummy::create('WITR\Eboard');
		$eboard->name = 'name for test';
		$form = $eboard->toArray();
		unset($form['id']);

		$this->beAdmin();
		$this->visit('/admin/eboard/' . $eboard->id)
			->onPage('/admin/eboard/' . $eboard->id)
			->submitForm('Update Position', $form)
			->andSee('Position Saved!')
			->onPage('/admin/eboard')
			->verifyInDatabase('eboard', $form);
	}

	/** @test */
	public function it_validates_an_edit_request()
	{
		$eboard = TestDummy::create('WITR\Eboard');
		$eboard->name = '';
		$form = $eboard->toArray();
		unset($form['id']);

		$this->beAdmin();
		$this->visit('/admin/eboard/' . $eboard->id)
			->onPage('/admin/eboard/' . $eboard->id)
			->submitForm('Update Position', $form)
			->andSee('The name field is required')
			->onPage('/admin/eboard/' . $eboard->id);
	}
}
