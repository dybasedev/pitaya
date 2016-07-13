<?php
/**
 * Order.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 00:53
 */

namespace ActLoudBur\Business\OrderSystem;

use Illuminate\Database\Eloquent\Model;
use App;
use Closure;
use DB;

/**
 * Class Order
 *
 * 订单模型
 *
 * @package ActLoudBur\Business\OrderSystem
 */
class Order extends Model
{
    /**
     * 订单初始状态
     */
    const STATUS_BEGIN = 'a0';

    /**
     * 订单待支付状态
     */
    const STATUS_WAIT_FOR_PAYMENT = 'wp';

    /**
     * 订单待发货状态
     */
    const STATUS_WAIT_FOR_DISPATCH = 'wd';

    /**
     * 订单待收货状态
     */
    const STATUS_WAIT_FOR_RECEIPT = 'wr';

    /**
     * 订单待评价状态
     */
    const STATUS_WAIT_FOR_EVALUATE = 'we';

    /**
     * 订单待退货处理
     */
    const STATUS_WAIT_FOR_REFUND_PROCESS = 'wR';
    
    /**
     * 订单终结状态
     */
    const STATUS_TERMINATE = 'tm';

    /**
     * @var array
     */
    protected $callbackStack = [];

    /**
     * 设置订单状态
     *
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        /** @var OrderStatusHandler $statusHandle */
        $statusHandle = \App::make(OrderStatusHandler::class);

        $previousStatus = $statusHandle->getHandler($this, $this->getStatus());
        $nextStatus     = $statusHandle->getHandler($this, $status);

        $callback = $nextStatus->arrive($previousStatus);
        
        if ($callback instanceof Closure) {
            $this->callbackStack[] = $callback;
        }
        
        if (!is_null($previousStatus)) {
            $callback = $previousStatus->leave($nextStatus);
            if ($callback instanceof Closure) {
                $this->callbackStack[] = $callback;
            }
        }
        
        $this->attributes['status'] = $status;

        return $this;
    }

    /**
     * 获取状态值(代码)
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->attributes['status_code'];
    }

    /**
     * 通过 status_code 的 setter 设置状态
     * 
     * @param $status
     */
    public function setStatusCodeAttribute($status)
    {
        $this->setStatus($status);
    }

    /**
     * 保存订单
     *
     * @param array $options
     *
     * @return bool
     */
    public function save(array $options = [])
    {
        return DB::transaction(function () use ($options) {

            foreach ($this->callbackStack as $callback) {
                call_user_func($callback, $this);
            }

            return parent::save($options);
        });
    }
}