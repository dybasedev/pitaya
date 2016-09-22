<?php
/**
 * Consumable.php
 *
 * Creator:    Sun
 * Created at: 2016/09/19 11:28
 */

namespace Pitaya\ConsumableSystem\Interfaces;

/**
 * Interface Consumable
 *
 * 消费品SPU
 *
 * @package Pitaya\ConsumableSystem\Interfaces
 */
interface Consumable
{
    /**
     * 返回价格区间
     *
     * @param string|null $currency 货币类型
     *
     * @return array eg: [1200, 5850] 表示价格在 12.00 ~ 58.50 之间
     */
    public function getPriceRange($currency = null);

    /**
     * 获取最高价
     *
     * @param string|null $currency 货币类型
     *
     * @return int
     */
    public function getMaximumPrice($currency = null);

    /**
     * 获取最低价
     *
     * @param string|null $currency 货币类型
     *
     * @return int
     */
    public function getMinimalPrice($currency = null);

    /**
     * 获取默认 SKU 项
     *
     * 对于不存在多个 SKU 的系统, 该方法也是获取消费品明细的通道
     *
     * @return ConsumableStockKeepingUnit
     */
    public function getDefaultSkuItem();
}