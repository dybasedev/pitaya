<?php
/**
 * SettlementParameterBag.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/19 17:22
 */

namespace Pitaya\ContractSystem\SettlementSystem;

/**
 * Class SettlementParameterBag
 *
 * 提交结算参数的数据包类
 *
 * @package Pitaya\ContractSystem\SettlementSystem
 */
abstract class SettlementParameterBag
{
    /**
     * @var array
     */
    protected $data;

    /**
     * SettlementParameterBag constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return SettlementParameterBag
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function hasKey($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->data);
    }

    /**
     * @param string $key
     * @param array  $value
     *
     * @return self
     */
    public function add($key, array $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->data[$key];
    }
}