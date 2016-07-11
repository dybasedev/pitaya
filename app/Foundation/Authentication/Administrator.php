<?php
/**
 * Administrator.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/01 23:37
 */

namespace ActLoudBur\Foundation\Authentication;

use ActLoudBur\Foundation\Authentication\Admin\Role;
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

    /**
     * 关联的角色
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'administrator_role', 'administrator_id', 'role_id')
                    ->withTimestamps();
    }
}