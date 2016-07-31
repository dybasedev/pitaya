<?php
/**
 * OrderArchive.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 18:12
 */

namespace ActLoudBur\Business\OrderSystem;

use ActLoudBur\Business\Contracts\Order;
use Closure;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * 获取订单明细
     *
     * @param Closure $callback 查询回调
     *
     * @return Collection
     */
    public function getSpecifications(Closure $callback = null)
    {
        if (is_null($callback)) {
            return $this->specifications()->getResults();
        }

        return call_user_func($callback, $this->specifications()->getQuery());
    }

    /**
     * 关联的订单明细
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifications()
    {
        return $this->hasMany(OrderSpecification::class, 'archive_id', 'id');
    }


}