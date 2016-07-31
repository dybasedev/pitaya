<?php
/**
 * OrderSpecification.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/31 13:59
 */

namespace ActLoudBur\Business\Contracts;

/**
 * Interface OrderSpecification
 * 
 * 订单明细接口
 *
 * @package ActLoudBur\Business\Contracts
 */
interface OrderSpecification
{
    /**
     * 获取订单主体
     * 
     * @return Order
     */
    public function getOrder();

    /**
     * 获取订单档案
     * 
     * @return OrderArchive
     */
    public function getArchive();
}