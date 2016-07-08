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


    public function boot()
    {
        $sidebar = $this->app->make(SidebarManager::class);

        $sidebar->add('quick-navigation', ['title' => trans('power-m.framework.quick-navigation')], true);
        $sidebar->add('dashboard', ['title' => trans('power-m.framework.dashboard'), 'icon' => 'fa fa-dashboard']);
        $sidebar->add('a', ['title' => trans('power-m.framework.dashboard')]);
        $sidebar->add('a.b', ['title' => trans('power-m.framework.dashboard'), 'href' => '/']);

        view()->share(['sidebarItems' => $sidebar, 'sidebar' => $sidebar]);
    }
}