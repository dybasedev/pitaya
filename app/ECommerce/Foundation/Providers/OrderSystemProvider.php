<?php
/**
 * OrderSystemProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/27 09:53
 */

namespace PitayaApplication\ECommerce\Foundation\Providers;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem\OrderStatusHandler;

class OrderSystemProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(OrderStatusHandler::class, function (Container $app) {
            return OrderStatusHandler::getInstance($app);
        });
    }

    public function boot(OrderStatusHandler $handler)
    {
        $status = $this->app['config']['pitaya.order_system.order_status'];

        foreach ($status as $statusName => $statusHandle) {
            $handler->bind($statusName, $statusHandle);
        }
    }
}