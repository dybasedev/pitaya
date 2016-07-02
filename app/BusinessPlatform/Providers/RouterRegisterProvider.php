<?php
/**
 * RouterRegisterProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 11:10
 */

namespace CloudGo\BusinessPlatform\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class RouterRegisterProvider
 *
 * @package CloudGo\BusinessPlatform\Providers
 */
class RouterRegisterProvider extends ServiceProvider
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
    
    public function boot(Router $router) {
        $router->group(['namespace' => 'CloudGo\BusinessPlatform\Http'], function (Router $router) {
            $router->get('/', 'WelcomeController@index');
        });
    }

}