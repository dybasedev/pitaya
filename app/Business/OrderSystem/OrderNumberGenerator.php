<?php
/**
 * OrderNumberGenerator.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 18:23
 */

namespace ActLoudBur\Business\OrderSystem;

use Illuminate\Contracts\Foundation\Application;
use App;

/**
 * Class OrderNumberGenerator
 * 
 * 订单号生成器
 *
 * @package ActLoudBur\Business\OrderSystem
 */
class OrderNumberGenerator
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @var int 用户 ID
     */
    protected $userId;

    /**
     * @var OrderNumberGenerator
     */
    protected static $instance;

    /**
     * OrderNumberGenerator constructor.
     *
     * @param Application $application
     */
    protected function __construct(Application $application)
    {
        $this->application = $application;
        $this->userId      = (int)$this->application->make('auth')
                                                    ->guard($this->application('config')->get('auth.defaults.guard'))
                                                    ->id();
    }

    /**
     * 获取单号生成器实例
     * 
     * @param Application|null $application
     *
     * @return OrderNumberGenerator|static
     */
    public static function getInstance(Application $application = null)
    {
        if (is_null(static::$instance)) {
            if (is_null($application)) {
                $application = App::getInstance();
            }
            
            return static::$instance = new static($application);
        }
        
        return static::$instance;
    }

    /**
     * 生成订单号
     *
     * @param Order $order
     *
     * @return string
     */
    public function serialize(Order $order)
    {
        $id = (int)$order->getAttribute('id');
        
        return (string)($id * 1000 + $this->userId) . (string)rand(100, 999);
    }

    /**
     * 获取真实订单 ID
     * 
     * @param $orderNumber
     *
     * @return int
     */
    public function unserialize($orderNumber)
    {
        $actual = (int)substr($orderNumber, 0, -3);
        
        return $actual - $this->userId;
    }
}