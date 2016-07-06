<?php
/**
 * Request.php
 *
 * Creator:    chongyi
 * Created at: 2016/07/04 15:24
 */

namespace ActLoudBur\PowerManagement\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * @return bool
     */
    abstract public function authorize();

    /**
     * @return array
     */
    abstract public function rules();
}