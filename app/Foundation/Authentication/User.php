<?php
/**
 * User.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/01 23:39
 */

namespace ActLoudBur\Foundation\Authentication;

use ActLoudBur\Business\SupplyChain\BusinessContributorTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * 普通用户、会员模型
 *
 * @package ActLoudBur\Foundation\Authentication
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}