<?php


/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 11:28
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