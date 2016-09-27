<?php

use Illuminate\Database\Seeder;

class DefaultUserGenerateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\PitayaApplication\ECommerce\Foundation\UserSystem\User::class, 5)->create();
        factory(\PitayaApplication\ECommerce\Foundation\UserSystem\Manager::class)->create();
    }
}
