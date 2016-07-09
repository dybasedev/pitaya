<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FoundationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $blueprint) {
            $blueprint->comment = '会员表';

            $blueprint->increments('id')->comment('会员 ID');
            $blueprint->string('name')->comment('会员账户名');
            $blueprint->string('email')->unique()->comment('会员 E-mail');
            $blueprint->string('password')->comment('会员密码');
            $blueprint->rememberToken();
            $blueprint->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $blueprint) {
            $blueprint->comment = '密码重置记录表';

            $blueprint->string('email')->index();
            $blueprint->string('token')->index();
            $blueprint->timestamp('created_at');
        });

        Schema::create('administrators', function (Blueprint $blueprint) {
            $blueprint->comment = '后台管理员表';

            $blueprint->increments('id')->comment('管理员 ID');
            $blueprint->string('account')->unique()->comment('管理员账户');
            $blueprint->string('password')->comment('管理员密码');
            $blueprint->rememberToken();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('administrators');
        Schema::drop('password_resets');
    }
}
