<?php

namespace PitayaApplication\ECommerce\Foundation\UserSystem;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Pitaya\UserSystem\Interfaces\User as UserInterface;
use Pitaya\UserSystem\Interfaces\Provider;
use Pitaya\UserSystem\Interfaces\Purchaser;

class User extends Authenticatable implements Provider, Purchaser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_credential', 'email', 'password', 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取用户验证的凭据
     *
     * @return string
     */
    public function getAccessCredential()
    {
        return $this->getAttribute('access_credential');
    }

    /**
     * 设置用户验证所使用的凭据, 一般在新建用户时调用该方法
     *
     * @param string $credential
     *
     * @return self
     */
    public function setAccessCredential($credential)
    {
        $this->setAttribute('access_credential', $credential);

        return $this;
    }

    /**
     * 获取用户类型
     *
     * @return int 返回值可能是 1, 2, 3
     */
    public function getUserType()
    {
        return (int)$this->getAttribute('user_type');
    }

    /**
     * 获取是否为采购方
     *
     * @return bool
     */
    public function isPurchaser()
    {
        return UserInterface::USER_TYPE_PURCHASER === $this->getUserType();
    }

    /**
     * 获取是否为供应方
     *
     * @return bool
     */
    public function isProvider()
    {
        return UserInterface::USER_TYPE_PROVIDER === $this->getUserType();
    }

    /**
     * 获取是否为采购方且为供应方
     *
     * @return bool
     */
    public function isPurchaserAndProvider()
    {
        return (UserInterface::USER_TYPE_PURCHASER | UserInterface::USER_TYPE_PROVIDER)=== $this->getUserType();
    }


}
