<?php
/**
 * OrderStatusTransitionException.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 19:07
 */

namespace ActLoudBur\Business\Exceptions;

use ActLoudBur\Business\OrderSystem\Order;
use RuntimeException;

/**
 * Class OrderStatusTransitionException
 * 
 * 订单状态跃迁过程异常
 *
 * @package ActLoudBur\Business\Exceptions
 */
class OrderStatusTransitionException extends RuntimeException
{
    /**
     * @var Order
     */
    protected $order;
    
    /**
     * OrderStatusTransitionException constructor.
     */
    public function __construct(Order $order, $message = '', $code = 0)
    {
        parent::__construct($message, $code);
        
        $this->order = $order;
    }
}