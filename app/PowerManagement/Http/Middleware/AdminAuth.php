<?php
/**
 * Auth.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/08 14:00
 */

namespace ActLoudBur\PowerManagement\Http\Middleware;

use Closure;
use Auth;

/**
 * Class AdminAuth
 *
 * 后台登录状态验证
 *
 * @package ActLoudBur\PowerManagement\Http\Middleware
 */
class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard(config('admin'))->guest()) {
            return redirect()->route('power-m.auth.login-form');
        }

        return $next($request);
    }
}