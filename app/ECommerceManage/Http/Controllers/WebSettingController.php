<?php
/**
 * WebController.php
 *
 * Creator:    Sun
 * Created at: 2016/09/26 16:47
 */

namespace PitayaApplication\ECommerceManage\Http\Controllers;


use PitayaApplication\Base\Http\Controllers\Controller;
use PitayaApplication\ECommerce\Foundation\Site\SiteSetting;
use PitayaApplication\ECommerceManage\Http\Requests\SiteSettingRequest;

/**
 * Class WebSettingController
 *
 * 站点设置控制器
 *
 * @package PitayaApplication\ECommerceManage\Http\Controllers
 */
class WebSettingController extends Controller
{
    public function index(SiteSetting $setting)
    {
        $setting->get();
        //TODO 返回的格式类还没有写。
    }

    /**
     * 保存站点设置
     *
     * @param SiteSettingRequest $request
     * @param SiteSetting $setting
     * @return bool
     */
    public function store(SiteSettingRequest $request, SiteSetting $setting)
    {
        $keys = array_keys($request->rules());

        $setting->set($request->only($keys));

        return true;
    }

}