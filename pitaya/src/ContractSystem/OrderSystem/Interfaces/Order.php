<?php
/**
 * Order.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/19 11:18
 */

namespace Pitaya\ContractSystem\OrderSystem\Interfaces;

use Pitaya\ContractSystem\OrderSystem\Exceptions\StatusChangeException;

/**
 * Interface Order
 *
 * 订单接口
 *
 * @package Pitaya\ContractSystem\OrderSystem\Interfaces
 */
interface Order
{
    /**
     * 获取订单项
     *
     * @return OrderItem[]
     */
    public function getItems();

    /**
     * 设置订单状态
     *
     * @param string|int|OrderStatus $status
     *
     * @return StatusFilterReport|null 返回空, 若状态改变被拦截, 则返回拦截器报告
     *
     * @throws StatusChangeException
     */
    public function setStatus($status);
}