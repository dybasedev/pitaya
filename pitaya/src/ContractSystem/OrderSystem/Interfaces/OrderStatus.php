<?php
/**
 * OrderStatus.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/19 16:36
 */

namespace Pitaya\ContractSystem\OrderSystem\Interfaces;

/**
 * Interface OrderStatus
 *
 * 订单状态
 *
 * @package Pitaya\ContractSystem\OrderSystem\Interfaces
 */
interface OrderStatus
{
    /**
     * 状态进入
     *
     * @param Order            $order
     * @param OrderStatus|null $previousStatus
     *
     * @return null|StatusFilterReport
     */
    public function arrive(Order $order, OrderStatus $previousStatus = null);

    /**
     * 状态离开
     *
     * @param Order            $order
     * @param OrderStatus|null $nextStatus
     *
     * @return null|StatusFilterReport
     */
    public function leave(Order $order, OrderStatus $nextStatus = null);
}