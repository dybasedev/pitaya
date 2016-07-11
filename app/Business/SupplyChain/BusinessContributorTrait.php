<?php
/**
 * BusinessContributorTrait.php
 *
 * Creator:    chongyi
 * Created at: 2016/7/11 0011 17:32
 */

namespace ActLoudBur\Business\SupplyChain;

use ActLoudBur\Business\SupplyChain\Consumables\Consumable;
use ActLoudBur\Business\SupplyChain\Consumables\Goods\Goods;

/**
 * Class BusinessContributorTrait
 *
 * 商务贡献人
 *
 * @package ActLoudBur\Business\SupplyChain
 */
trait BusinessContributorTrait
{
    /**
     * 关联的店铺模型
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'user_id', 'id');
    }
    
    /**
     * 关联的消费品模型
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function consumables()
    {
        return $this->morphMany(Consumable::class, 'publisher');
    }

    /**
     * 关联的商品模型
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function goods()
    {
        return $this->morphMany(Goods::class, 'publisher');
    }
}