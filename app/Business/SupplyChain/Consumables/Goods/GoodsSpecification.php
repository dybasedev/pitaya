<?php
/**
 * GoodsSpecification.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 00:59
 */

namespace ActLoudBur\Business\SupplyChain\Consumables\Goods;

use ActLoudBur\Business\Contracts\Consumable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsSpecification
 * 
 * 商品 SKU 对象模型
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables\Goods
 */
class GoodsSpecification extends Model implements Consumable
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
     * 关联的所属的商品 SPU 模型
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(GoodsSpecification::class, 'goods_id', 'id');
    }
}