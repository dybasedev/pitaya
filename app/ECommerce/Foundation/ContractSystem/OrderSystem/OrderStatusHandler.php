<?php
/**
 * OrderStatusHandler.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/27 09:54
 */

namespace PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem;

use InvalidArgumentException;
use Illuminate\Contracts\Container\Container;
use Pitaya\ContractSystem\OrderSystem\Interfaces\OrderStatus;

/**
 * Class OrderStatusHandler
 *
 * 订单状态控制器
 *
 * @package PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem
 */
class OrderStatusHandler
{
    /**
     * @var self
     */
    protected static $instance;

    /**
     * @var Container
     */
    protected $app;

    /**
     * @var array
     */
    protected $statusMap = [];

    /**
     * OrderStatusHandler constructor.
     *
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * 获取实例
     *
     * @param Container|null $app
     *
     * @return OrderStatusHandler|static
     */
    public static function getInstance(Container $app = null)
    {
        if (is_null(static::$instance)) {
            if (is_null($app)) {
                throw new InvalidArgumentException();
            }

            return static::$instance = new static($app);
        }

        return static::$instance;
    }

    /**
     * 绑定状态
     *
     * @param $status
     * @param $statusHandler
     *
     * @return self
     */
    public function bind($status, $statusHandler)
    {
        $this->statusMap[$status] = $statusHandler;
        $this->app->bind([$statusHandler => $status], $statusHandler);

        return $this;
    }

    /**
     * 获取是否存在状态
     *
     * @param $status
     *
     * @return bool
     */
    public function has($status)
    {
        return isset($this->statusMap[$status]) || in_array($status, $this->statusMap);
    }

    /**
     * 获取状态实例
     *
     * @param $status
     *
     * @return OrderStatus
     */
    public function make($status)
    {
        if ($status instanceof OrderStatus) {
            return $this->make(get_class($status));
        }

        if (!$this->has($status)) {
            throw new InvalidArgumentException();
        }

        return $this->app->make($this->statusMap[$status]);
    }
}