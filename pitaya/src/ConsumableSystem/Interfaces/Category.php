<?php
/**
 * Category.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/20 10:23
 */

namespace Pitaya\ConsumableSystem\Interfaces;

use Closure;

/**
 * Interface Category
 *
 * 消费品品类接口
 *
 * @package Pitaya\ConsumableSystem\Interfaces
 */
interface Category
{
    /**
     * 是否有子类
     *
     * @return bool
     */
    public function hasChildren();

    /**
     * 获取子品类
     *
     * @param Closure|null $callback 过滤器回调
     *
     * @return Category[]|null
     */
    public function getChildren(Closure $callback = null);

    /**
     * 获取父品类
     *
     * @return Category|null
     */
    public function getParent();

    /**
     * 获取用于展示的名称
     *
     * @param string|int|null $locale 区域, 用于区分国家地区以显示不同语言对应的名称
     *
     * @return string
     */
    public function getDisplayName($locale = null);

    /**
     * 获取标识符、ID
     *
     * @return string|int
     */
    public function getIdentifier();

    /**
     * 获取全局唯一名称 (标识符)
     *
     * @return string
     */
    public function getUniqueName();

    /**
     * 判断是否为根类
     *
     * @return bool
     */
    public function isRootCategory();
}