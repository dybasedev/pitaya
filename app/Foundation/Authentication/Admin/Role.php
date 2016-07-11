<?php
/**
 * Role.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/09 19:05
 */

namespace ActLoudBur\Foundation\Authentication\Admin;

use ActLoudBur\Foundation\Authentication\Administrator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * 管理员角色
 *
 * @package ActLoudBur\Foundation\Authentication\Admin
 */
class Role extends Model
{
    /**
     * 关联的管理员模型
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function administrators()
    {
        return $this->belongsToMany(Administrator::class, 'administrator_role', 'role_id', 'administrator_id')
                    ->withTimestamps();
    }
}