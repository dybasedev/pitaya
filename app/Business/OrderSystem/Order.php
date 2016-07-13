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