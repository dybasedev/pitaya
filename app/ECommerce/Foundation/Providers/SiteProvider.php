<?php
/**
 * SiteProvider.php
 *
 * Creator:    chongyi
 * Created at: 2016/09/23 11:07
 */

namespace PitayaApplication\ECommerce\Foundation\Providers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use PitayaApplication\ECommerce\Foundation\Site\SiteSetting;

/**
 * Class SiteProvider
 *
 * 站点服务提供者
 *
 * @package PitayaApplication\ECommerce\Foundation
 */
class SiteProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SiteSetting::class, function (Application $application) {
            $filesystem = $application->make(Filesystem::class);

            return new SiteSetting($this->app['config']['app.site_setting_file_path'], $filesystem);
        });
    }
}