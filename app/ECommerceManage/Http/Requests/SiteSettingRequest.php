<?php
/**
 * SiteSettingRequest.php
 *
 * Creator:    Sun
 * Created at: 2016/09/26 16:52
 */

namespace PitayaApplication\ECommerceManage\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
{
    protected function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_name'            => 'require|max:100',
            'site_icp'             => 'require|max:255',
            'site_logo_path'       => 'require',
            'site_seo_title'       => 'require|max:100',
            'site_seo_description' => 'require|max:255',
            'site_seo_keywords'    => 'require|max:255',
        ];
    }
}