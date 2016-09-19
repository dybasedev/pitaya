<?php
/**
 * User.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/18 17:57
 */

namespace Pitaya\UserSystem\Interfaces;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Interface User
 *
 * 用户接口
 *
 * @package Pitaya\UserSystem\Interfaces
 */
interface User extends Authenticatable
{
    const USER_TYPE_PROVIDER = 1;

    const USER_TYPE_PURCHASER = 2;

    /**
     * 获取用户验证的凭据
     *
     * @return string
     */
    public function getAccessCredential();

    /**
     * 设置用户验证所使用的凭据, 一般在新建用户时调用该方法
     *
     * @param string $credential
     *
     * @return self
     */
    public function setAccessCredential($credential);

    /**
     * 获取用户类型
     *
     * @return int 返回值可能是 1, 2, 3
     */
    public function getUserType();

    /**
     * 获取是否为采购方
     *
     * @return bool
     */
    public function isPurchaser();

    /**
     * 获取是否为供应方
     *
     * @return bool
     */
    public function isProvider();

    /**
     * 获取是否为采购方且为供应方
     *
     * @return bool
     */
    public function isPurchaserAndProvider();
}