<?php
/**
 * Manager.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/23 10:05
 */

namespace Pitaya\UserSystem\Interfaces;

/**
 * Interface Manager
 *
 * 系统管理成员接口
 *
 * @package Pitaya\UserSystem\Interfaces
 */
interface Manager
{
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
}