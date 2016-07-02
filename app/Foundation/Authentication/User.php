<?php
/**
 * User.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/01 23:39
 */

namespace CloudGo\Foundation\Authentication;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * 普通用户、会员模型
 *
 * @package CloudGo\Foundation\Authentication
 */
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];
    
    protected $hidden = [
        'password', 'remember_token'
    ];
}