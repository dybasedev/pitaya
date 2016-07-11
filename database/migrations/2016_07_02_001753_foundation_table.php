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
            $blueprint->timestamps();
        });

        Schema::create('roles', function (Blueprint $blueprint) {
            $blueprint->comment = '后台管理员角色表';

            $blueprint->increments('id');
            $blueprint->string('name')->unique()->comment('角色标识符');
            $blueprint->string('display_name')->index()->comment('角色名称');
            $blueprint->string('description')->comment('角色简介');
            $blueprint->timestamps();
        });

        Schema::create('administrator_role', function (Blueprint $blueprint) {
            $blueprint->integer('administrator_id')->unsigned()->index()->comment('管理员 ID');
            $blueprint->integer('role_id')->unsigned()->index()->comment('角色 ID');
            $blueprint->boolean('primary_reference')->default(false)->comment('主要参考，在多个角色授权的情况下，权限冲突则以主要参考为基准');
            $blueprint->timestamps();

            $blueprint->primary(['administrator_id', 'role_id'], 'primary_index');
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
        Schema::drop('roles');
        Schema::drop('administrator_role');
    }
}
