<?php
/**
 * DashboardController.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 15:36
 */

namespace ActLoudBur\PowerManagement\Http\Controllers\Site;

use ActLoudBur\PowerManagement\Http\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('power-management.common.admin');
    }
}