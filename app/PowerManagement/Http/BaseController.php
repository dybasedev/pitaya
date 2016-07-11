<?php
/**
 * BaseController.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/3 0:18
 */

namespace ActLoudBur\PowerManagement\Http;


use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    /**
     * 默认分页每页数据条数
     */
    const PER_PAGE = 20;
}