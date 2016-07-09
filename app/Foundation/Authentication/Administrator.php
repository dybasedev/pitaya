<?php
/**
 * Administrator.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/01 23:37
 */

namespace ActLoudBur\Foundation\Authentication;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Administrator
 * 
 * 管理员模型
 *
 * @package ActLoudBur\Foundation\Authentication
 */
class Administrator extends Authenticatable
{
    protected $fillable = ['account', 'password'];
}