<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_credential')->unique()->comment('登录凭据');
            $table->string('password')->nullable()->comment('密码, 可以为空 (为空仅作为特别业务需求使用)');
            $table->string('email')->nullable()->unique()->comment('邮件箱, 找回密码所使用, 个别业务需求可能不需要该字段, 因此不要依赖');
            $table->boolean('user_type')->comment('用户类型, 目前仅包含 3 类, 对应 1 、2 、1 + 2');
            $table->rememberToken();
            $table->timestamps();
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
    }
}
