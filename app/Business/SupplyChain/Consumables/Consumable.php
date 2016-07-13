<?php
/**
 * Consumable.php
 *
 * Creator:    chongyi
 * Created at: 2016/7/11 0011 17:02
 */

namespace ActLoudBur\Business\SupplyChain\Consumables;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Consumable
 * 
 * 消费品模型
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables
 */
class Consumable extends Model
{
    /**
     * 关联的实际消费品模型
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function consumable()
    {
        return $this->morphTo();
    }

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
     * 关联的发布者
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function publisher()
    {
        return $this->morphTo();
    }
}