<?php
/**
 * GoodsEvaluate.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 14:13
 */

namespace ActLoudBur\Business\SupplyChain\Consumables\Goods;

use ActLoudBur\Foundation\Authentication\UserRelateTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsEvaluate
 * 
 * 商品评价模型
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables\Goods
 */
class GoodsEvaluate extends Model
{
    use UserRelateTrait;

    /**
     * 关联的发布人
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->user();
    }

    /**
     * 关联的商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id', 'id');
    }

    /**
     * 关联的评价
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(GoodsComment::class, 'evaluate_id', 'id');
    }
}