<?php
/**
 * Store.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 10:22
 */

namespace ActLoudBur\Business\SupplyChain;

use ActLoudBur\Business\SupplyChain\Consumables\Consumable;
use ActLoudBur\Business\SupplyChain\Consumables\Goods\Goods;
use ActLoudBur\Foundation\Authentication\UserRelateTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * 
 * 店铺模型
 * 
 * 店铺模型主要是针对系统为多商家模式时的使用方案,对于单商家仅会存在一个店铺
 *
 * @package ActLoudBur\Business\SupplyChain
 */
class Store extends Model
{
    use UserRelateTrait;

    /**
     * 店铺下的消费品
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consumables()
    {
        return $this->hasMany(Consumable::class, 'store_id', 'id');
    }

    /**
     * 店铺下的商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goods()
    {
        return $this->hasMany(Goods::class, 'store_id', 'id');
    }
}