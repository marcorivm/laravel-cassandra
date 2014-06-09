<?php namespace Kalpeshhpatel\LaravelCassandra;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class LaravelCassandraServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('kalpeshhpatel/laravel-cassandra');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
            $this->app['Cassandra'] = $this->app->share(function($app)
            {
                return new Cassandra();
            });

            $this->app->booting(function()
            {
                $loader = AliasLoader::getInstance();
                $loader->alias('Cassandra', 'Kalpeshhpatel\LaravelCassandra\Facades\Cassandra');
            });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
