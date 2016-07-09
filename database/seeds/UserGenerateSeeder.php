<?php

use Illuminate\Database\Seeder;
use ActLoudBur\Foundation\Authentication\Administrator;
use ActLoudBur\Foundation\Authentication\User;

class UserGenerateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::create([
            'account'  => 'administrator',
            'password' => bcrypt('administrator'),
        ]);
    }
}
