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
        // TODO: Implement getPrice() method.
    }

    /**
     * 获取库存数量
     *
     * @return float
     */
    public function getStock()
    {
        // TODO: Implement getStock() method.
    }

    /**
     * 获取单位名
     *
     * @return string
     */
    public function getUnit()
    {
        // TODO: Implement getUnit() method.
    }

    /**
     * 获取 SPU 项
     *
     * @return Consumable
     */
    public function getMaster()
    {
        // TODO: Implement getMaster() method.
    }


}