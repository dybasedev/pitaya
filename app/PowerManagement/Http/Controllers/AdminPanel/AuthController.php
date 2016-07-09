<?php
/**
 * AuthController.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/3 0:20
 */

namespace ActLoudBur\PowerManagement\Http\Controllers\AdminPanel;


use ActLoudBur\PowerManagement\Http\BaseController;
use ActLoudBur\PowerManagement\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\MessageBag;

/**
 * Class AuthController
 *
 * @package ActLoudBur\PowerManagement\Http\Controllers\Site
 */
class AuthController extends BaseController
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * AuthController constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoginForm()
    {
        return view('power-management.login');
    }

    /**
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::guard($this->app['config']['power-m.auth.guard'])
                ->attempt($request->only([
                    $this->app['config']['power-m.auth.identifier'],
                    $this->app['config']['power-m.auth.password'],
                ]))
        ) {
            return redirect()->route('power-m.dashboard');
        }
        
        return back()->withErrors(['forbidden' => trans('auth.failed')]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard($this->app['config']['power-m.auth.guard'])->logout();
        
        return back();
    }
}