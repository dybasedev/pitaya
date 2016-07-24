<?php
/**
 * RouteServiceProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 14:14
 */

namespace ActLoudBur\PowerManagement\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class RouteServiceProvider
 * 
 * 路由定义组件
 *
 * @package ActLoudBur\PowerManagement\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'ActLoudBur\PowerManagement\Http\Controllers';

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
        $router->group(['namespace' => $this->namespace, 'prefix' => 'admin', 'middleware' => ['web']],
            function (Router $router) {
                $router->group(['namespace' => 'AdminPanel', 'prefix' => 'web'], function (Router $router) {
                    $router->get('login', ['uses' => 'AuthController@getLoginForm', 'as' => 'power-m.admin.auth.login-form']);
                    $router->post('login', ['uses' => 'AuthController@login', 'as' => 'power-m.admin.auth.login']);
                    $router->any('logout', ['uses' => 'AuthController@logout', 'as' => 'power-m.admin.auth.logout']);

                    $router->group(['middleware' => ['admin-auth', 'admin-panel']], function (Router $router) {
                        $router->get('dashboard', ['uses' => 'DashboardController@index', 'as' => 'power-m.admin.dashboard']);
                        $router->resource('member/user', 'Member\UserController',
                            ['names' => ['index' => 'power-m.admin.member.user.index']]);
                    });
                });

                $router->get('/', 'AdminPanel\DashboardController@visit');
            });
    }

}