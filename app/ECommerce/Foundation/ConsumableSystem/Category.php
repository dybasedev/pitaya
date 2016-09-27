<?php
/**
 * Category.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/20 10:21
 */

namespace PitayaApplication\ECommerce\Foundation\ConsumableSystem;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Pitaya\ConsumableSystem\Interfaces\Category as CategoryInterface;

/**
 * Class Category
 *
 * 消费品品类
 *
 * @package PitayaApplication\ECommerce\Foundation\ConsumableSystem
 */
class Category extends Model implements CategoryInterface
{
    /**
     * 是否有子类
     *
     * @return bool
     */
    public function hasChildren()
    {
        return (bool)$this->getAttribute('has_children');
    }

    /**
     * 获取子品类
     *
     * @param Closure|null $callback 过滤器回调
     *
     * @return CategoryInterface[]|Collection|null
     */
    public function getChildren(Closure $callback = null)
    {
        if (!$this->hasChildren()) {
            return null;
        }

        $relation = $this->hasMany(static::class, 'parent_id', 'id');

        if (is_null($callback)) {
            return $relation->getResults();
        }

        return call_user_func($callback, $relation->getQuery(), $this);
    }

    /**
     * 获取父品类
     *
     * @return CategoryInterface|null
     */
    public function getParent()
    {
        if ($this->isRootCategory()) {
            return null;
        }

        return $this->belongsTo(static::class, 'parent_id', 'id')->getResults();
    }

    /**
     * 获取用于展示的名称
     *
     * @param string|int|null $locale 区域, 用于区分国家地区以显示不同语言对应的名称
     *
     * @return string
     */
    public function getDisplayName($locale = null)
    {
        return $this->getAttribute('display_name');
    }

    /**
     * 获取标识符、ID
     *
     * @return string|int
     */
    public function getIdentifier()
    {
        return $this->getKey();
    }

    /**
     * 获取全局唯一名称 (标识符)
     *
     * @return string
     */
    public function getUniqueName()
    {
        return $this->getAttribute('name');
    }

    /**
     * 判断是否为根类
     *
     * @return bool
     */
    public function isRootCategory()
    {
        return (0 === (int)$this->getAttribute('parent_id'));
    }

}