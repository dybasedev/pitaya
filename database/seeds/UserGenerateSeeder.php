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
        Administrator::truncate();
        User::truncate();
        
        Administrator::create([
            'account'  => 'administrator',
            'password' => bcrypt('administrator'),
        ]);

        User::create([
            'name'     => 'Dumper',
            'email'    => 'dumper@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name'     => 'Controller',
            'email'    => 'controller@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
