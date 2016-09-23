<?php
/**
 * Manager.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/23 10:04
 */

namespace PitayaApplication\ECommerce\Foundation\UserSystem;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Pitaya\UserSystem\Interfaces\Manager as ManagerInterface;

/**
 * Class Manager
 *
 * 网站管理成员
 *
 * @package PitayaApplication\ECommerce\Foundation\UserSystem
 */
class Manager extends Authenticatable implements ManagerInterface
{
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

}