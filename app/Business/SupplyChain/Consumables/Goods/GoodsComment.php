<?php
/**
 * GoodsComment.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/11 21:21
 */

namespace ActLoudBur\Business\SupplyChain\Consumables\Goods;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsComment
 * 
 * 商品评论模型
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables\Goods
 */
class GoodsComment extends Model
{
    /**
     * 关联的发布者, 用以划分卖家买家
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function publisher()
    {
        return $this->morphTo();
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluate()
    {
        return $this->belongsTo(GoodsComment::class, 'evaluate_id', 'id');
    }
}