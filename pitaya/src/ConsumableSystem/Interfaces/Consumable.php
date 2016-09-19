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
     * @return array;
     */
    public function getPriceRange($currency = null);
}