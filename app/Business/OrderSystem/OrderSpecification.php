<?php
/**
 * OrderSpecification.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/31 14:04
 */

namespace ActLoudBur\Business\OrderSystem;

use ActLoudBur\Business\Contracts\Order;
use ActLoudBur\Business\Contracts\OrderSpecification as OrderSpecificationInterface;
use Illuminate\Database\Eloquent\Model;

class OrderSpecification extends Model implements OrderSpecificationInterface
{
    /**
     * 获取订单主体
     *
     * @return Order
     */
    public function getOrder()
    {
        return $this->order()->getResults();
    }

    /**
     * 关联的订单
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}