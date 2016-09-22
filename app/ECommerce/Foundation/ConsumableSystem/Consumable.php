<?php
/**
 * Consumable.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/22 17:51
 */

namespace PitayaApplication\ECommerce\Foundation\ConsumableSystem;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Pitaya\ConsumableSystem\Interfaces\ConsumableStockKeepingUnit;
use Pitaya\ConsumableSystem\Interfaces\ConsumableWithManySKUItems as ConsumableInterface;

class Consumable extends Model implements ConsumableInterface
{
    /**
     * 返回价格区间
     *
     * @param string|null $currency 货币类型
     *
     * @return array eg: [1200, 5850] 表示价格在 12.00 ~ 58.50 之间
     */
    public function getPriceRange($currency = null)
    {
        return [$this->getMinimalPrice($currency), $this->getMaximumPrice($currency)];
    }

    /**
     * 获取最高价
     *
     * @param string|null $currency 货币类型
     *
     * @return int
     */
    public function getMaximumPrice($currency = null)
    {
        return (int)$this->getAttribute('maximum_price');
    }

    /**
     * 获取最低价
     *
     * @param string|null $currency 货币类型
     *
     * @return int
     */
    public function getMinimalPrice($currency = null)
    {
        return (int)$this->getAttribute('minimal_price');
    }

    /**
     * 获取默认 SKU 项
     *
     * 对于不存在多个 SKU 的系统, 该方法也是获取消费品明细的通道
     *
     * @return ConsumableStockKeepingUnit|Builder|Model
     */
    public function getDefaultSkuItem()
    {
        return $this->specifications()->getQuery()->first();
    }

    /**
     * 获取 SKU 项
     *
     * @param Closure|null $callback 过滤器回调
     *
     * @return ConsumableStockKeepingUnit[]|Collection
     */
    public function getSkuItems(Closure $callback = null)
    {
        if (is_null($callback)) {
            return $this->specifications()->getResults();
        }

        $query = $this->specifications()->getQuery();

        call_user_func($callback, $query);

        return $query->get();
    }

    /**
     * 关联的 SKU 项
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifications()
    {
        return $this->hasMany(ConsumableSpecifications::class, 'consumable_id', 'id');
    }

}