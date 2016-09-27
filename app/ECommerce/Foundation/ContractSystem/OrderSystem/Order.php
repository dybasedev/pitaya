<?php
/**
 * Order.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/26 16:57
 */

namespace PitayaApplication\ECommerce\Foundation\ContractSystem\OrderSystem;

use Log;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Pitaya\ContractSystem\OrderSystem\Exceptions\StatusChangeException;
use Pitaya\ContractSystem\OrderSystem\Interfaces\Order as OrderInterface;
use Pitaya\ContractSystem\OrderSystem\Interfaces\OrderItem;
use Pitaya\ContractSystem\OrderSystem\Interfaces\OrderStatus;
use Pitaya\ContractSystem\OrderSystem\Interfaces\StatusFilterReport;

class Order extends Model implements OrderInterface
{
    /**
     * 获取订单项
     *
     * @param Closure $callback 过滤器
     *
     * @return OrderItem[]
     */
    public function getItems(Closure $callback)
    {
        $relation = $this->hasMany(OrderItem::class, 'order_id', 'id');

        if (is_null($callback)) {
            return $relation->getResults();
        }

        return call_user_func($callback, $relation->getQuery(), $this);
    }

    /**
     * 设置订单状态
     *
     * @param string|int|OrderStatus $status
     *
     * @return StatusFilterReport|null 返回空, 若状态改变被拦截, 则返回拦截器报告
     *
     * @throws StatusChangeException
     */
    public function setStatus($status)
    {
        try {
            /** @var OrderStatusHandler $handler */
            $handler = app()->make(OrderStatusHandler::class);

            $nextStatusHandle = $handler->make($status);

            if (is_null($previous = $this->getAttribute('status'))) {
                $previousStatusHandle = null;
            } else {
                $previousStatusHandle = $handler->make($previous);
                $result               = $previousStatusHandle->leave($this, $nextStatusHandle);

                if ($result instanceof StatusFilterReport) {
                    return $result;
                }
            }

            return $nextStatusHandle->arrive($this, $previousStatusHandle);
        } catch (StatusChangeException $exception) {
            Log::notice('Order status change exception', [
                'order_id'            => $this->id,
                'order_target_status' => $status instanceof OrderStatus ? get_class($status) : $status,
            ]);

            throw $exception;
        }
    }

}