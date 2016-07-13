<?php
/**
 * OrderStatusHandler.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 19:14
 */

namespace ActLoudBur\Business\OrderSystem;

use RuntimeException;

/**
 * Class OrderStatusHandler
 * 
 * 订单状态管理器
 *
 * @package ActLoudBur\Business\OrderSystem
 */
class OrderStatusHandler
{
    /**
     * @var
     */
    protected $handlers;

    /**
     * @var OrderStatusHandler
     */
    protected static $instance;

    /**
     * 获取实例
     * 
     * @return OrderStatusHandler
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            return static::$instance = new static;
        }

        return static::$instance;
    }

    /**
     * 注册订单状态
     * 
     * @param $code
     * @param $handler
     */
    public function registerStatus($code, $handler)
    {
        if (class_exists($handler)) {
            $this->handlers[$code] = $handler;
        } else {
            throw new RuntimeException('Undefined handler class.');
        }
    }
    /**
     * 获取状态控制器
     * 
     * @param Order $order
     * @param       $code
     *
     * @return OrderStatusInterface
     */
    public function getHandler(Order $order, $code)
    {
        if (is_null($code)) {
            return null;
        }

        $handlerClass = $this->handlers[$code];

        return new $handlerClass($order);
    }
}