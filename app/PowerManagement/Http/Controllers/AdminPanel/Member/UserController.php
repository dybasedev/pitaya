<?php
/**
 * UserController.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/09 17:30
 */

namespace ActLoudBur\PowerManagement\Http\Controllers\AdminPanel\Member;

use ActLoudBur\Foundation\Authentication\User;
use ActLoudBur\PowerManagement\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * 用户管理控制器
 *
 * @package ActLoudBur\PowerManagement\Http\Controllers\AdminPanel\Member
 */
class UserController extends BaseController
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($search = $request->query('search')) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('id', $search);
            });
        }
        
        $collection = $query->paginate($request->query('per_page', parent::PER_PAGE));
        
        return view('power-management.admin.member.user.index', ['collection' => $collection, 'request' => $request]);
    }
}