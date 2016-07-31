<?php
/**
 * Order.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/02 00:53
 */

namespace ActLoudBur\Business\OrderSystem;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use ActLoudBur\Business\Contracts\Order as OrderInterface;
use ActLoudBur\Business\Contracts\OrderSpecification as OrderSpecificationInterface;
use ActLoudBur\Business\Contracts\OrderArchive as OrderArchiveInterface;
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
class Order extends Model implements OrderInterface
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

    /**
     * 获取档案
     *
     * @return OrderArchiveInterface
     */
    public function getArchive()
    {
        return $this->archive()->getResults();
    }

    /**
     * 关联的档案
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function archive()
    {
        return $this->hasOne(OrderArchive::class, 'order_id', 'id');
    }

    /**
     * 获取明细
     *
     * @param Closure $callback
     *
     * @return OrderSpecificationInterface|Collection
     */
    public function getSpecifications(Closure $callback = null)
    {
        if (is_null($callback)) {
            return $this->specifications()->getResults();
        }
        
        return call_user_func($callback, $this->specifications()->getQuery());
    }


    /**
     * 关联的明细
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifications()
    {
        return $this->hasMany(OrderSpecification::class, 'order_id', 'id');
    }


}