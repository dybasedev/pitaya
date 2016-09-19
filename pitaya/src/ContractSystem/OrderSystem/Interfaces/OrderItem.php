<?php
/**
 * OrderItem.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/19 11:18
 */

namespace Pitaya\ContractSystem\OrderSystem\Interfaces;

/**
 * Interface OrderItem
 *
 * 订单项接口
 *
 * @package Pitaya\ContractSystem\OrderSystem\Interfaces
 */
interface OrderItem
{
    public function getConsumable();

    public function getConsumableStockKeepingUnit();
}