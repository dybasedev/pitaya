<?php
/**
 * User.php
 *
 * Creator:         chongyi
 * Create Datetime: 2016/7/24 17:29
 */

namespace ActLoudBur\Business;

use ActLoudBur\Business\SupplyChain\BusinessContributorTrait;
use ActLoudBur\Foundation\Authentication\User as FoundationUser;

/**
 * Class User
 *
 * 电商用户模型
 *
 * @package ActLoudBur\Business
 */
class User extends FoundationUser
{
    use BusinessContributorTrait;
    
    /**
     * 买家
     */
    const PURCHASER = 1;

    /**
     * 卖家
     */
    const PROVIDER = 2;

    /**
     * 是否是采购者、买家
     * 
     * @return bool
     */
    public function isPurchaser()
    {
        return $this->attributes['type'] == self::PURCHASER;
    }

    /**
     * 是否是供应者、卖家
     * 
     * @return bool
     */
    public function isProvider()
    {
        return $this->attributes['type'] == self::PROVIDER;
    }
}