<?php
/**
 * Settlement.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/19 13:51
 */

namespace Pitaya\ContractSystem\SettlementSystem;

/**
 * Interface Settlement
 *
 * 结算对象
 *
 * @package Pitaya\ContractSystem\SettlementSystem
 */
interface Settlement
{
    /**
     * 发送结算过程所需要的相关参数
     *
     * @param SettlementParameterBag $parameter
     *
     * @return self
     */
    public function send(SettlementParameterBag $parameter);

    /**
     * 执行结算过程
     *
     * @return SettlementProcessReport|null
     */
    public function execute();
}