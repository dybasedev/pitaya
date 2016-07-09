<?php
/**
 * PowerManagementProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 14:14
 */

namespace ActLoudBur\PowerManagement\Providers;


use ActLoudBur\PowerManagement\Frame\SidebarManager;
use Illuminate\Support\AggregateServiceProvider;

class PowerManagementProvider extends AggregateServiceProvider
{
    protected $providers = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(SidebarManager::class);
    }
}