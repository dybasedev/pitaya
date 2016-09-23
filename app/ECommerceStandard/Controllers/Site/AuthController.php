<?php
/**
 * AuthController.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/23 12:00
 */

namespace PitayaApplication\ECommerceStandard\Controllers\Site;

use Auth;
use Validator;
use Illuminate\Http\Request;
use PitayaApplication\ECommerce\Foundation\UserSystem\User;

/**
 * Class AuthController
 *
 * 授权控制器
 *
 * @package PitayaApplication\ECommerceStandard\Controllers\Site
 */
class AuthController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account' => 'required|exists:users,access_credential',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $attempt = [
            'access_credential' => $request->input('account'),
            'password'          => $request->input('password'),
        ];

        if (Auth::guard(User::class)->attempt($attempt)) {
            return redirect()->guest('/');
        }

        return redirect()->back()->withErrors(['failed']);
    }

    public function logout()
    {
        Auth::guard(User::class)->logout();

        return redirect()->back();
    }
}