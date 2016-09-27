<?php
/**
 * ConsumableSpecifications.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/22 17:52
 */

namespace PitayaApplication\ECommerce\Foundation\ConsumableSystem;

use Illuminate\Database\Eloquent\Model;
use Pitaya\ConsumableSystem\Interfaces\Consumable;
use Pitaya\ConsumableSystem\Interfaces\ConsumableStockKeepingUnit;

/**
 * Class ConsumableSpecifications
 *
 * 消费品明细项 (SKU) 模型
 *
 * @package PitayaApplication\ECommerce\Foundation\ConsumableSystem
 */
class ConsumableSpecifications extends Model implements ConsumableStockKeepingUnit
{
    /**
     * 获取价格
     *
     * @param string|null $currency 货币类型
     *
     * @return int
     */
    public function getPrice($currency = null)
    {
        return (int)$this->getAttribute('actual_price');
    }

    /**
     * 获取库存数量
     *
     * @return int
     */
    public function getStock()
    {
        return (int)$this->getAttribute('stock');
    }

    /**
     * 获取单位名
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->getAttribute('unit');
    }

    /**
     * 获取 SPU 项
     *
     * @return Consumable
     */
    public function getMaster()
    {
        return $this->belongsTo(Consumable::class, 'consumable_id', 'id')->getResults();
    }


}