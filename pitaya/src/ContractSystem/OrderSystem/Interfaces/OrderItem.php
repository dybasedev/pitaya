<?php
/**
 * OrderItem.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/19 11:18
 */

namespace Pitaya\ContractSystem\OrderSystem\Interfaces;

use Pitaya\ConsumableSystem\Interfaces\Consumable;
use Pitaya\ConsumableSystem\Interfaces\ConsumableStockKeepingUnit;

/**
 * Interface OrderItem
 *
 * 订单项接口
 *
 * @package Pitaya\ContractSystem\OrderSystem\Interfaces
 */
interface OrderItem
{
    /**
     * 获取订单主体
     *
     * @return Order
     */
    public function getOrder();

    /**
     * 获取消费品
     *
     * @return Consumable
     */
    public function getConsumable();

    /**
     * 获取消费品 SKU
     *
     * @return ConsumableStockKeepingUnit
     */
    public function getConsumableStockKeepingUnit();
}