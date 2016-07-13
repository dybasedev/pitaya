<?php
/**
 * ShoppingCartItems.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 00:55
 */

namespace ActLoudBur\Business\OrderSystem;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShoppingCart
 * 
 * 购物车模型
 *
 * @package ActLoudBur\Business\OrderSystem
 */
class ShoppingCartItem extends Model
{
    /**
     * 关联的加入购物车的消费品
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function consumables()
    {
        return $this->morphTo();
    }
}