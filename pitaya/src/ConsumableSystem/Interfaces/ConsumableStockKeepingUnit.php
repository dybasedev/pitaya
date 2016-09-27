<?php
/**
 * ConsumableStockKeepingUnit.php
 *
 * Creator:    Sun
 * Created at: 2016/09/19 11:30
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
     * @return int
     */
    public function getStock();

    /**
     * 获取单位名
     *
     * @return string
     */
    public function getUnit();

    /**
     * 获取 SPU 项
     *
     * @return Consumable
     */
    public function getMaster();
}