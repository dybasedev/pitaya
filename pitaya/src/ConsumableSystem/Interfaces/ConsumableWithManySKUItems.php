<?php
/**
 * ConsumableWithManySKUItems.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/22 17:48
 */

namespace Pitaya\ConsumableSystem\Interfaces;

use Closure;

/**
 * Interface ConsumableWithManySKUItems
 *
 * 存在多个 SKU 项的消费品
 *
 * @package Pitaya\ConsumableSystem\Interfaces
 */
interface ConsumableWithManySKUItems extends Consumable
{
    /**
     * 获取 SKU 项
     *
     * @param Closure|null $callback 过滤器回调
     *
     * @return ConsumableStockKeepingUnit[]
     */
    public function getSkuItems(Closure $callback = null);

}