<?php
/**
 * BuildFrame.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/08 11:53
 */

namespace ActLoudBur\PowerManagement\Http\Middleware;

use Closure;
use ActLoudBur\PowerManagement\Frame\SidebarManager;

/**
 * Class AdministratorControlPanel
 * 
 * 后台管理员管理面板中间件
 *
 * @package ActLoudBur\PowerManagement\Http\Middleware
 */
class AdministratorControlPanel
{
    /**
     * @var SidebarManager
     */
    protected $sidebar;

    /**
     * BuildFrame constructor.
     *
     * @param SidebarManager $sidebar
     */
    public function __construct(SidebarManager $sidebar)
    {
        $this->sidebar = $sidebar;
    }

    /**
     * @param          $request
     * @param Closure  $next
     */
    public function handle($request, Closure $next)
    {
        $this->sidebar->add('quick-navigation', ['title' => trans('power-m.framework.quick-navigation')], true);
        $this->sidebar->add('dashboard', [
            'title' => trans('power-m.framework.dashboard'),
            'href'  => route('power-m.dashboard'),
            'icon'  => 'fa fa-dashboard',
        ]);

        view()->share(['sidebarItems' => $this->sidebar, 'sidebar' => $this->sidebar]);

        return $next($request);
    }
}