<?php namespace WITR\Providers;

use Illuminate\Support\ServiceProvider;
use WITR\Services\Whitelist;
use WITR\Services\IcecastReader;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'WITR\Services\Registrar'
		);

		if ($this->app->environment('production')) {
			$this->app->bind('WITR\TopTwenty\Reader', 'WITR\TopTwenty\SQLReader');
		} else {
			$this->app->bind('WITR\TopTwenty\Reader', 'WITR\TopTwenty\DummyReader');
		}

		if($this->app->environment('local'))
		{
			$this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
			$this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
		}

		$this->app->singleton('WITR\ViewComposers\UsersViewComposer');
		$this->app->singleton('WITR\ViewComposers\ShowsViewComposer');

		$this->app['view']->composers([
			'WITR\ViewComposers\UsersViewComposer' => 'shared.user_dropdown',
			'WITR\ViewComposers\ShowsViewComposer' => 'shared.show_dropdown',
			'WITR\ViewComposers\VideoViewComposer' => 'home.partials.video',
			'WITR\ViewComposers\AlbumsViewComposer' => 'home.partials.albums',
			'WITR\ViewComposers\SliderViewComposer' => 'home.partials.slider',
			'WITR\ViewComposers\NowPlayingViewComposer' => 'home.partials.nowplaying',
			'WITR\ViewComposers\TopTwentyViewComposer' => 'home.partials.toptwenty',
			'WITR\ViewComposers\AuthViewComposer' => 'layouts.partials.auth-buttons',
		]);

		$this->app->bind('WITR\Services\Whitelist', function($app) {
			$config = $app['config'];
			$startIp = $config['witr.whitelist.start'];
			$endIp = $config['witr.whitelist.end'];
			return new Whitelist($startIp, $endIp);
		});

		$this->app->bind('WITR\Services\IcecastReader', function($app) {
			$config = $app['config'];
			$hostname = $config['witr.icecast.hostname'];
			$credentials = $config['witr.icecast.credentials'];
			$mounts = $config['witr.icecast.mounts'];
			return new IcecastReader($hostname, $credentials, $mounts);
		});
	}

}
