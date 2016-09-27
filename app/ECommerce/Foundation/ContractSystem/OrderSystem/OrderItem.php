<?php
/**
 * OrderItem.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/26 16:58
 */

namespace PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem;

use Illuminate\Database\Eloquent\Model;
use Pitaya\ConsumableSystem\Interfaces\Consumable;
use Pitaya\ContractSystem\OrderSystem\Interfaces\Order;
use Pitaya\ConsumableSystem\Interfaces\ConsumableStockKeepingUnit;
use Pitaya\ContractSystem\OrderSystem\Interfaces\OrderItem as ItemInterface;

/**
 * Class OrderItem
 *
 * 订单项模型
 *
 * @package PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem
 */
class OrderItem extends Model implements ItemInterface
{
    /**
     * 获取订单主体
     *
     * @return Order
     */
    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id')->getResults();
    }

    /**
     * 获取消费品
     *
     * @return Consumable
     */
    public function getConsumable()
    {
        return $this->belongsTo(Consumable::class, 'consumable_id', 'id')->getResults();
    }

    /**
     * 获取消费品 SKU
     *
     * @return ConsumableStockKeepingUnit
     */
    public function getConsumableStockKeepingUnit()
    {
        return $this->belongsTo(ConsumableStockKeepingUnit::class, 'consumable_specification_id', 'id')->getResults();
    }

}