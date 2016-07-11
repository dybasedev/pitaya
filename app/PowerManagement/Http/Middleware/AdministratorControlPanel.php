<?php
/**
 * BuildFrame.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/08 11:53
 */

namespace ActLoudBur\PowerManagement\Http\Middleware;

use ActLoudBur\PowerManagement\Frame\BootstrapPaginationPresenter;
use Closure;
use ActLoudBur\PowerManagement\Frame\SidebarManager;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\Paginator;

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
        // 添加自定义分页样式
        Paginator::presenter(function (AbstractPaginator $paginator) {
            return new BootstrapPaginationPresenter($paginator);
        });

        $this->sidebar->add('quick-navigation', ['title' => trans('power-m.framework.quick-navigation')], true);
        $this->sidebar->add('dashboard', [
            'title' => trans('power-m.framework.dashboard'),
            'href'  => route('power-m.dashboard'),
            'icon'  => 'fa fa-dashboard',
        ]);
        $this->sidebar->add('module-navigation', ['title' => 'MODULE NAVIGATION'], true);
        $this->sidebar->add('member', ['title' => 'Member']);
        $this->sidebar->add('member.user',
            ['title' => 'User', 'href' => route('power-m.admin.member.user.index'), 'icon' => 'fa fa-user']);

        view()->share(['sidebarItems' => $this->sidebar, 'sidebar' => $this->sidebar]);

        return $next($request);
    }
}