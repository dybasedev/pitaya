<?php

class ExampleTest extends TestCase
{
    public function testSiteSetting()
    {
        $setting = $this->app->make(\PitayaApplication\ECommerce\Foundation\Site\SiteSetting::class);

        $setting->a = 1;
        $setting->b = 'b';

        $this->assertEquals(1, $setting->a);
        $this->assertEquals('b', $setting->b);

        unset($setting);

        $this->assertTrue(is_file(storage_path('app/' . config('app.site_setting_file_path'))));

        $setting = $this->app->make(\PitayaApplication\ECommerce\Foundation\Site\SiteSetting::class);
        $setting->destroy();
        unset($setting);

        $this->assertFalse(is_file(storage_path('app/' . config('app.site_setting_file_path'))));
    }


}
