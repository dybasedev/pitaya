<?php
/**
 * PowerManagementGuard.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 12:48
 */

namespace CloudGo\PowerManagement\Auth;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Foundation\Application;

class PowerManagementGuard implements Guard
{
    protected $app;

    protected $provider;

    /**
     * PowerManagementGuard constructor.
     *
     * @param Application  $app
     * @param UserProvider $provider
     */
    public function __construct($app, UserProvider $provider)
    {
        $this->app      = $app;
        $this->provider = $provider;
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        // TODO: Implement guest() method.
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        // TODO: Implement user() method.
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id()
    {
        // TODO: Implement id() method.
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array $credentials
     *
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        // TODO: Implement validate() method.
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        // TODO: Implement setUser() method.
    }


}