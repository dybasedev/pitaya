<?php
/**
 * Category.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 00:58
 */

namespace ActLoudBur\Business\SupplyChain\Consumables;

use ActLoudBur\Business\SupplyChain\Consumables\Goods\CategoryTrait as GoodsCategoryTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * 消费品分类模型
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables
 */
class Category extends Model
{
    use GoodsCategoryTrait;
    
    /**
     * 关联的消费品
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consumables()
    {
        return $this->hasMany(Consumable::class, 'category_id', 'id');
    }

    /**
     * 关联的品牌
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_category', 'category_id', 'brand_id');
    }
}