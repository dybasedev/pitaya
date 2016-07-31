<?php
/**
 * OrderArchive.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/31 13:58
 */

namespace ActLoudBur\Business\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Closure;

/**
 * Interface OrderArchive
 * 
 * 订单档案接口
 *
 * @package ActLoudBur\Business\Contracts
 */
interface OrderArchive
{
    /**
     * 获取订单主体
     * 
     * @return Order
     */
    public function getOrder();

    /**
     * 获取订单明细
     * 
     * @param Closure $callback 查询回调
     * 
     * @return Collection
     */
    public function getSpecifications(Closure $callback = null);
}