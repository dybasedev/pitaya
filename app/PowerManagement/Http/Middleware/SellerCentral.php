<?php
/**
 * SellerCentral.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/24 17:38
 */

namespace ActLoudBur\PowerManagement\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;
use ActLoudBur\PowerManagement\Frame\BootstrapPaginationPresenter;
use ActLoudBur\PowerManagement\Frame\SidebarManager;

/**
 * Class SellerCentral
 *
 * 卖家登录状态验证及后台面板
 *
 * @package ActLoudBur\PowerManagement\Http\Middleware
 */
class SellerCentral
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

    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->guest()) {
            return redirect()->route('power-m.auth.login-form');
        }

        // 验证通过则表示可以展示面板数据
        // 添加自定义分页样式
        Paginator::presenter(function (AbstractPaginator $paginator) {
            return new BootstrapPaginationPresenter($paginator);
        });

        // 生成侧边栏
        $this->generateSideBar();

        return $next($request);
    }

    protected function generateSideBar()
    {
        
    }
}