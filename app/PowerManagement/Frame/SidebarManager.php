<?php
/**
 * SidebarManager.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/07 15:36
 */

namespace ActLoudBur\PowerManagement\Frame;

use IteratorAggregate;
use ArrayIterator;
use Traversable;

/**
 * Class SidebarManager
 *
 * 边栏管理器
 *
 * @package ActLoudBur\PowerManagement\Frame
 */
class SidebarManager implements IteratorAggregate
{
    /**
     * @var
     */
    protected $items;

    /**
     * @var
     */
    protected $itemDataSet;

    /**
     * @param       $name
     * @param array $parameters
     * @param bool  $header
     *
     * @return $this
     */
    public function add($name, $parameters = [], $header = false)
    {
        array_set($this->items, $name, $header ? null : $name);

        $this->itemDataSet[$name] = $parameters;

        return $this;
    }

    /**
     * @param null $name
     *
     * @return mixed
     */
    public function get($name = null)
    {
        if (is_null($name)) {
            return $this->items;
        }

        return $this->itemDataSet[$name];
    }

    /**
     * Retrieve an external iterator
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}