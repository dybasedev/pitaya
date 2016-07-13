<?php
/**
 * OrderStatusInterface.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/13 19:12
 */

namespace ActLoudBur\Business\OrderSystem;

/**
 * Interface OrderStatusInterface
 *
 * 订单状态操作接口
 *
 * @package ActLoudBur\Business\OrderSystem
 */
interface OrderStatusInterface
{
    /**
     * 状态到达
     * 
     * @param null $previousStatus
     *
     * @return mixed
     */
    public function arrive($previousStatus = null);

    /**
     * 状态离开
     * 
     * @param null $nextStatus
     *
     * @return mixed
     */
    public function leave($nextStatus = null);
}