<?php
/**
 * AuthController.php
 *
 * Creator:    Sun
 * Created at: 2016/09/23 10:38
 */

namespace PitayaApplication\ECommerceManage\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PitayaApplication\ECommerce\Foundation\UserSystem\Manager;
use Validator;

/**
 * Class AuthController
 *
 * 后台授权验证器
 *
 * @package PitayaApplication\ECommerceManage\Http\Controllers
 */
class AuthController extends BaseController
{
    /**
     * 登录
     *
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account'  => 'required',
            'password' => 'required',
        ]);

        if ($validator->failed()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = Manager::query()->where('access_credential', $request->account)->first();

        if(!$user){
            return view('manage.user.login.fail');
        };

        if(Auth::guard(Manager::class)->attempt(['access_credential' => $request->account, 'password' => $request->password])){
            return view('manage.user.login.success');
        }

        return view('manage.user.login.fail');
    }

    /**
     * 注销
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout()
    {
        Auth::guard(Manager::class)->logout();

        return view('manage.user.login.index');
    }
}