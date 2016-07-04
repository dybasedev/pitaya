<?php
/**
 * RouteServiceProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 14:14
 */

namespace CloudGo\PowerManagement\Providers;


use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'CloudGo\PowerManagement\Http\Controllers';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    public function boot(Router $router)
    {
        $router->group(['namespace' => $this->namespace, 'prefix' => 'admin'], function (Router $router) {
            $router->group(['namespace' => 'Site', 'prefix' => 'web'], function (Router $router) {
                $router->get('login', ['uses' => 'AuthController@getLoginForm', 'as' => 'power-m.auth.login-form']);
                $router->post('login', ['uses' => 'AuthControllerController@login', 'as' => 'power-m.auth.login']);
                
                $router->group([], function (Router $router) {
                    $router->get('dashboard', ['uses' => 'DashboardController@index']);
                });
            });
        });
    }

}