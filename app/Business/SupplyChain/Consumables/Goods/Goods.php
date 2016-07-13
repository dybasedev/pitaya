<?php
/**
 * Goods.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/01 23:28
 */

namespace ActLoudBur\Business\SupplyChain\Consumables\Goods;

use ActLoudBur\Business\SupplyChain\Consumables\Category;
use ActLoudBur\Business\SupplyChain\Store;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Goods
 * 
 * 商品 SPU 对象模型
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables\Goods
 */
class Goods extends Model
{
    /**
     * 关联的店铺
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
    
    /**
     * 关联的分类
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * 关联的发布者
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function publisher()
    {
        return $this->morphTo();
    }

    /**
     * 关联所属的商品 SKU 对象
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skuItems()
    {
        return $this->hasMany(GoodsSpecification::class, 'goods_id', 'id');
    }

    /**
     * 关联的商品评价
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluates()
    {
        return $this->hasMany(GoodsEvaluate::class, 'goods_id', 'id');
    }
}