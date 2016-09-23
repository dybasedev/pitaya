<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    public function testSiteSetting()
    {
        $setting = $this->app->make(\PitayaApplication\ECommerce\Foundation\Site\SiteSetting::class);

        $setting->a = 1;
        $setting->b = 'b';

        $this->assertEquals(1, $setting->a);
        $this->assertEquals('b', $setting->b);
    }


}
