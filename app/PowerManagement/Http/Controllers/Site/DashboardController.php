<?php
/**
 * DashboardController.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 15:36
 */

namespace CloudGo\PowerManagement\Http\Controllers\Site;

use CloudGo\PowerManagement\Http\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('power-management.common.base');
    }
}