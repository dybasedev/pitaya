<?php
/**
 * OrderArchive.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 18:12
 */

namespace ActLoudBur\Business\OrderSystem;

use ActLoudBur\Business\Contracts\Order;
use Illuminate\Database\Eloquent\Model;
use ActLoudBur\Business\Contracts\OrderArchive as OrderArchiveInterface;

/**
 * Class OrderArchive
 *
 * 订单档案资料模型
 *
 * @package ActLoudBur\Business\OrderSystem
 */
class OrderArchive extends Model implements OrderArchiveInterface
{
    /**
     * 关联的订单
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * 获取订单主体
     *
     * @return Order
     */
    public function getOrder()
    {
        return $this->order()->getResults();
    }


}