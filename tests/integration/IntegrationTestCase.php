<?php

use Laracasts\Integrated\Extensions\Laravel as Integrated;
use WITR\User;

class IntegrationTestCase extends Integrated {

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	/**
     * Get the base url for all requests.
     *
     * @return string
     */
    public function baseUrl()
    {
        return "https://witr.dev";
    }

    protected function beAdmin()
    {
    	$user = new User(['email' => 'normal@example.com', 'user_role' => 3]);
		$this->be($user);
    }

    protected function beEditor()
    {
    	$user = new User(['email' => 'normal@example.com', 'user_role' => 2]);
		$this->be($user);
    }

    protected function beUser()
    {
    	$user = new User(['email' => 'normal@example.com', 'user_role' => 1]);
		$this->be($user);
    }

}