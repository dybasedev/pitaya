<?php
/**
 * WelcomeController.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 11:16
 */

namespace CloudGo\BusinessPlatform\Http;

/**
 * Class WelcomeController
 *
 * 用于测试路由可用的控制器,临时的
 *
 * @package CloudGo\BusinessPlatform\Http
 */
class WelcomeController extends BaseController
{
    public function index()
    {
        return view('welcome');
    }
}