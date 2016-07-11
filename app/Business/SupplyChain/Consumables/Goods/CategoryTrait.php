<?php
/**
 * CategoryTrait.php
 *
 * Creator:    chongyi
 * Created at: 2016/7/11 0011 17:05
 */

namespace ActLoudBur\Business\SupplyChain\Consumables\Goods;

/**
 * Class CategoryTrait
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables\Goods
 */
trait CategoryTrait
{
    /**
     * 关联的商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goods()
    {
        return $this->hasMany(Goods::class, 'category_id', 'id');
    }
}