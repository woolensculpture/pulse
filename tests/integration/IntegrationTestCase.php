<?php

use Laracasts\Integrated\Extensions\Laravel as Integrated;

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

}
