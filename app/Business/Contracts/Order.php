<?php
/**
 * Order.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/31 13:57
 */

namespace ActLoudBur\Business\Contracts;

use Closure;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface Order
 * 
 * 订单接口
 *
 * @package ActLoudBur\Business\Contracts
 */
interface Order
{
    /**
     * 订单初始状态
     */
    const STATUS_BEGIN = 'a0';

    /**
     * 订单待支付状态
     */
    const STATUS_WAIT_FOR_PAYMENT = 'wp';

    /**
     * 订单待发货状态
     */
    const STATUS_WAIT_FOR_DISPATCH = 'wd';

    /**
     * 订单待收货状态
     */
    const STATUS_WAIT_FOR_RECEIPT = 'wr';

    /**
     * 订单待评价状态
     */
    const STATUS_WAIT_FOR_EVALUATE = 'we';

    /**
     * 订单待退货处理
     */
    const STATUS_WAIT_FOR_REFUND_PROCESS = 'wR';

    /**
     * 订单终结状态
     */
    const STATUS_TERMINATE = 'tm';
    
    /**
     * 获取档案
     * 
     * @return OrderArchive
     */
    public function getArchive();

    /**
     * 获取档案集合
     * 
     * 该方法仅针对存在一个订单下，拥有多个不同订单档案的情况，比如拆分物流的单子
     * 
     * @param Closure $callback 查询回调
     * 
     * @return Collection
     */
    public function getArchives(Closure $callback = null);

    /**
     * 获取明细
     * 
     * @param Closure $callback
     * 
     * @return OrderSpecification|Collection
     */
    public function getSpecifications(Closure $callback = null);

    /**
     * 设置订单状态
     * 
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status);

    /**
     * 获取订单当前状态码
     * 
     * @return string
     */
    public function getStatus();
}