<?php
/**
 * Brand.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/17 0:27
 */

namespace ActLoudBur\Business\SupplyChain\Consumables;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 *
 * 品牌
 *
 * @package ActLoudBur\Business\SupplyChain\Consumables
 */
class Brand extends Model
{
    /**
     * 关联的分类
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'brand_category', 'branch_id', 'category_id');
    }
}