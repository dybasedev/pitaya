<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 11:30
 */

namespace Pitaya\ConsumableSystem\Interfaces;

/**
 * Interface ConsumableStockKeepingUnit
 *
 * 消费品SKU
 *
 * @package Pitaya\ConsumableSystem\Interfaces
 */
interface ConsumableStockKeepingUnit
{
    /**
     * 获取价格
     *
     * @param string|null $currency 货币类型
     *
     * @return int
     */
    public function getPrice($currency = null);

    /**
     * 获取库存数量
     *
     * @return float
     */
    public function getStock();

    /**
     * 获取单位名
     *
     * @return string
     */
    public function getUnit();
}