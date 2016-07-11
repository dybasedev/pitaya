<?php
/**
 * UserRelateTrait.php
 *
 * Creator:    chongyi
 * Created at: 2016/7/11 0011 17:07
 */

namespace ActLoudBur\Foundation\Authentication;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserRelateTrait
 *
 * @package ActLoudBur\Foundation\Authentication
 */
trait UserRelateTrait
{
    /**
     * 所属的用户
     * 
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}