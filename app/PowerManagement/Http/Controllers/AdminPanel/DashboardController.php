<?php
/**
 * DashboardController.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 15:36
 */

namespace ActLoudBur\PowerManagement\Http\Controllers\AdminPanel;

use ActLoudBur\PowerManagement\Http\BaseController;

/**
 * Class DashboardController
 *
 * @package ActLoudBur\PowerManagement\Http\Controllers\AdminPanel
 */
class DashboardController extends BaseController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function visit()
    {
        return redirect()->route('power-m.dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('power-management.common.admin');
    }
}