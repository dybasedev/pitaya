<?php
/**
 * LoginRequest.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 15:21
 */

namespace ActLoudBur\PowerManagement\Http\Requests;

/**
 * Class LoginRequest
 * 
 * 登录表单验证
 *
 * @package ActLoudBur\PowerManagement\Http\Requests
 */
class LoginRequest extends Request
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'account'  => 'required',
            'password' => 'required',
        ];
    }

}