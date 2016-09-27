<?php
/**
 * Begin.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/27 10:04
 */

namespace PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem\OrderStatus;


use Pitaya\ContractSystem\OrderSystem\Interfaces\Order;
use Pitaya\ContractSystem\OrderSystem\Interfaces\OrderStatus;
use Pitaya\ContractSystem\OrderSystem\Interfaces\StatusFilterReport;

/**
 * Class Begin
 *
 * 起始状态
 *
 * @package PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem\OrderStatus
 */
class Begin implements OrderStatus
{
    /**
     * 状态进入
     *
     * @param Order            $order
     * @param OrderStatus|null $previousStatus
     *
     * @return null|StatusFilterReport
     */
    public function arrive(Order $order, OrderStatus $previousStatus = null)
    {
        return null;
    }

    /**
     * 状态离开
     *
     * @param Order            $order
     * @param OrderStatus|null $nextStatus
     *
     * @return null|StatusFilterReport
     */
    public function leave(Order $order, OrderStatus $nextStatus = null)
    {
        return  null;
    }

}