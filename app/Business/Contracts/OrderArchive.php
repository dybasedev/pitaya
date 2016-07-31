<?php
/**
 * OrderArchive.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/31 13:58
 */

namespace ActLoudBur\Business\Contracts;

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
}