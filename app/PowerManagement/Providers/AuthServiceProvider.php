<?php
/**
 * AuthServiceProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 12:49
 */

namespace CloudGo\PowerManagement\Providers;

use CloudGo\PowerManagement\Auth\PowerManagementGuard;
use Illuminate\Support\ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        Auth::extend('power', function ($app, $name, array $config) {
            return new PowerManagementGuard($app, Auth::createUserProvider($config['provider']));
        });
    }
}