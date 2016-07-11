<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessModuleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $blueprint) {
            $blueprint->comment = '全局消费品分类';

            $blueprint->increments('id');
            $blueprint->string('name')->nullable()->unique()->comment('分类标识符');
            $blueprint->string('display_name')->index()->comment('分类名称');
            $blueprint->integer('parent_id')->default(0)->comment('父分类 ID');
            $blueprint->integer('sort')->default(10)->comment('排序');
            $blueprint->timestamps();
        });

        Schema::create('consumables', function (Blueprint $blueprint) {
            $blueprint->comment = '消费品表';

            $blueprint->increments('id');
            $blueprint->integer('category_id')->unsigned()->comment('分类 ID');
            $blueprint->integer('publisher_id')->nullable()->unsigned()->comment('发布者 ID');
            $blueprint->string('publisher_type')->nullable()->comment('发布者类型');
            $blueprint->string('consumable_type')->nullable()->comment('消费品类型');
            $blueprint->integer('consumable_id')->unsigned()->nullable()->comment('消费品 ID');
            $blueprint->integer('weight')->default(100)->comment('权重');
            $blueprint->integer('total_sale')->default(0)->index()->comment('销售总额');
            $blueprint->timestamps();

            $blueprint->index(['consumable_type', 'consumable_id'], 'consumable_index');
            $blueprint->index(['publisher_type', 'publisher_id'], 'publisher_index');
        });

        Schema::create('goods', function (Blueprint $blueprint) {
            $blueprint->comment = '商品（SPU）表';

            $blueprint->increments('id');
            $blueprint->integer('category_id')->unsigned()->index()->comment('全局分类 ID');
            $blueprint->integer('publisher_id')->nullable()->unsigned()->comment('发布者 ID');
            $blueprint->string('publisher_type')->nullable()->comment('发布者类型');
            $blueprint->string('name')->index()->comment('商品名称');
            $blueprint->integer('maximum_price')->unsigned()->index()->comment('最高价格');
            $blueprint->integer('minimum_price')->unsigned()->index()->comment('最低价格');
            $blueprint->string('keywords')->index()->comment('关键字');
            $blueprint->boolean('sell_status')->default(true)->comment('销售状态');
            $blueprint->integer('total_sale')->default(0)->unsigned()->index()->comment('销售总量');
            $blueprint->integer('weight')->default(100)->comment('权重');
            $blueprint->string('specifications')->nullable()->index()->comment('规格项设置');
            $blueprint->timestamps();

            $blueprint->index(['publisher_type', 'publisher_id'], 'publisher_index');
        });

        Schema::create('goods_specifications', function (Blueprint $blueprint) {
            $blueprint->comment = '商品规格（SKU）表';

            $blueprint->increments('id');
            $blueprint->integer('goods_id')->unsigned()->index()->comment('商品 ID');
            $blueprint->string('name')->nullable()->index()->comment('名称');
            $blueprint->string('subtitle')->nullable()->comment('副标题');
            $blueprint->integer('origin_price')->unsigned()->index()->comment('原始价格');
            $blueprint->integer('total_sale')->default(0)->unsigned()->index()->comment('销售总量');
            $blueprint->tinyInteger('sort')->default(0)->unsgined()->comment('排序');
            $blueprint->integer('stock')->nullable()->unsigned()->default(0)->comment('库存，对于某些虚拟商品允许为空');
            $blueprint->boolean('sell_status')->default(true)->comment('销售状态，若 SPU 不可销售则该值无论和值都被认为是 0');
            $blueprint->string('specifications')->nullable()->index()->comment('规格值');
            $blueprint->timestamps();
        });

        Schema::create('stores', function (Blueprint $blueprint) {
            $blueprint->comment = '店铺表';

            $blueprint->increments('id');
            $blueprint->integer('user_id')->unsigned()->nullable()->comment('用户 ID');
            $blueprint->string('name')->unique()->comment('店铺名称');
            $blueprint->text('description')->comment('店铺简介');
            $blueprint->boolean('status')->default(0)->comment('店铺状态，0 表示未审批，1 表示已审批（但不一定生效，需参考生效时间）');
            $blueprint->timestamp('effective_at')->nullable()->comment('生效时间');
            $blueprint->timestamp('expired_at')->nullable()->comment('过期时间');
            $blueprint->integer('rank')->default(1)->index()->comment('店铺等级');
            $blueprint->integer('weight')->default(100)->comment('店铺权重');
            $blueprint->integer('score')->default(0)->unsigned()->index()->comment('店铺积分');
            $blueprint->integer('rating')->default(0)->unsigned()->index()->comment('店铺评分、评级（外部参与，内部由权重决定）');
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
        Schema::drop('categories');
        Schema::drop('consumables');
        Schema::drop('goods');
        Schema::drop('goods_specifications');
        Schema::drop('stores');
    }
}
