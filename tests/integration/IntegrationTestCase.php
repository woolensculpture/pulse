<?php

use Laracasts\Integrated\Extensions\Laravel as Integrated;
use WITR\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DomCrawler\Form;

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

    protected function makeRequestUsingForm(Form $form)
    {
        $plainFiles = $form->getFiles();
        foreach ($plainFiles as $key => $file) {
            $files[$key] = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['size'], $file['error'], true);
        }
        return $this->makeRequest(
            $form->getMethod(), $form->getUri(), $form->getValues(), [], $files
        );
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
