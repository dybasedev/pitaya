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
            $blueprint->integer('store_id')->unsigned()->comment('店铺 ID');
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

        Schema::create('brands', function (Blueprint $blueprint) {
            $blueprint->comment = '品牌表';

            $blueprint->increments('id');
            $blueprint->string('display_name')->index()->comment('品牌名称');
            $blueprint->string('alias')->index()->nullable()->comment('品牌别名');
            $blueprint->timestamps();
        });
        
        Schema::create('brand_category', function (Blueprint $blueprint) {
            $blueprint->comment = '品牌分类关联表';
            
            $blueprint->integer('brand_id')->unsigned()->index()->comment('品牌 ID');
            $blueprint->integer('category_id')->unsigned()->index()->comment('分类 ID');
            
            $blueprint->primary(['brand_id', 'category_id'], 'brand_category');
        });

        Schema::create('goods', function (Blueprint $blueprint) {
            $blueprint->comment = '商品（SPU）表';

            $blueprint->increments('id');
            $blueprint->integer('category_id')->unsigned()->index()->comment('全局分类 ID');
            $blueprint->integer('publisher_id')->nullable()->unsigned()->comment('发布者 ID');
            $blueprint->string('publisher_type')->nullable()->comment('发布者类型');
            $blueprint->integer('store_id')->unsigned()->comment('店铺 ID');
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
            $blueprint->integer('store_id')->unsigned()->comment('店铺 ID');
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
            $blueprint->integer('user_id')->unsigned()->nullable()->comment('用户 ID, 为空表示属于系统');
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

        Schema::create('goods_comments', function (Blueprint $blueprint) {
            $blueprint->comment = '商品评论表';

            $blueprint->increments('id');
            $blueprint->integer('evaluate_id')->unsigned()->index()->comment('评价 ID');
            $blueprint->integer('goods_id')->unsigned()->index()->comment('商品 ID');
            $blueprint->integer('publisher_id')->unsigned()->index()->comment('用户 ID');
            $blueprint->string('publisher_type')->index()->comment('用户类型');
            $blueprint->text('content')->comment('追加或店主回复的评论内容');
            $blueprint->boolean('anonymous')->default(true)->comment('是否匿名');
            $blueprint->timestamps();
        });

        Schema::create('goods_evaluates', function (Blueprint $blueprint) {
            $blueprint->comment = '商品评价表';

            $blueprint->increments('id');
            $blueprint->integer('goods_id')->unsigned()->index()->comment('商品 ID');
            $blueprint->integer('user_id')->unsigned()->index()->comment('用户 ID');
            $blueprint->boolean('rank')->default(5)->comment('整体评分');
            $blueprint->boolean('logistics')->default(5)->comment('物流评价');
            $blueprint->boolean('service')->default(5)->comment('服务评价');
            $blueprint->boolean('anonymous')->default(true)->comment('是否匿名');
            $blueprint->text('content')->comment('评价内容');
            $blueprint->boolean('has_comment')->default(false)->comment('是否有追加的评论');
            $blueprint->timestamps();
        });

        Schema::create('shopping_cart_items', function (Blueprint $blueprint) {
            $blueprint->comment = '购物车项表';

            $blueprint->bigIncrements('id');
            $blueprint->integer('user_id')->nullable()->index()->unsigned()->comment('用户 ID, (对于未登录时)可以为空');
            $blueprint->string('consumable_type')->index()->comment('消费品类型');
            $blueprint->integer('consumable_id')->index()->unsigned()->comment('消费品 ID');
            $blueprint->string('token')->nullable()->index()->comment('会话 TOKEN,对于未登录状态下加入购物车,便与其直接合并至后续会话');
            $blueprint->string('consumable_name')->index()->nullable()->comment('消费品名称缓存值');
            $blueprint->integer('original_price')->unsigned()->index()->comment('消费品原始价格');
            $blueprint->integer('actual_price')->unsigned()->index()->comment('消费品实际应付价格');
            $blueprint->integer('amount')->unsigned()->comment('购买数量');
            $blueprint->timestamps();
        });

        Schema::create('order', function (Blueprint $blueprint) {
            $blueprint->comment = '订单表';

            $blueprint->increments('id');
            $blueprint->string('order_number')->unique()->nullable()->comment('订单号');
            $blueprint->integer('store_id')->index()->unsigned()->comment('订单所属店铺 ID');
            $blueprint->char('status_code', 2)->index()->comment('订单状态码');
            $blueprint->integer('aggregate')->index()->unsigned()->comment('订单总额');
            $blueprint->integer('user_id')->unsigned()->index()->comment('用户 ID');
            $blueprint->timestamp('effective_at')->nullable()->comment('生效时间');
            $blueprint->timestamp('terminated_at')->nullable()->comment('订单终结时间');
            $blueprint->timestamps();

            // TODO 还差字段,正在思考和完善中
        });
        
        Schema::create('order_archives', function (Blueprint $blueprint) {
            $blueprint->comment = '订单档案数据表';

            $blueprint->increments('id');
            $blueprint->integer('order_id')->unique()->unsigned()->comment('订单 ID');
            $blueprint->string('address')->index()->comment('地址');
            $blueprint->boolean('logistics_type')->default(1)->comment('物流类型');
            $blueprint->integer('logistics_price')->nullable()->comment('物流价格');
            $blueprint->string('logistics_code')->nullable()->comment('物流编号');
            $blueprint->string('pay_code')->nullable()->comment('支付编号');
            $blueprint->string('payment')->nullable()->comment('支付方式');
            $blueprint->string('refund_code')->nullable()->comment('退款编号');
            $blueprint->timestamp('paid_at')->nullable()->comment('支付时间');
            $blueprint->timestamp('refund_at')->nullable()->comment('退款时间');
            $blueprint->timestamp('dispatched_at')->nullable()->comment('发货时间');
            $blueprint->timestamp('receipted_at')->nullable()->comment('收货时间');
            $blueprint->timestamps();
        });

        Schema::create('order_specifications', function (Blueprint $blueprint) {
            $blueprint->comment = '订单详情表';

            $blueprint->increments('id');
            $blueprint->integer('goods_id')->unsigned()->comment('商品 ID');
            $blueprint->integer('amount')->unsigned()->comment('总量');
            $blueprint->integer('original_price')->unsigned()->comment('原始单价');
            $blueprint->integer('aggregate')->unsigned()->comment('总计');

            $blueprint->string('goods_name')->nullable()->index()->comment('商品名称');
            $blueprint->string('goods_specifications')->nullable()->comment('商品规格信息');
            $blueprint->string('goods_image')->nullable()->comment('商品图片');
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
        Schema::drop('goods_evaluates');
        Schema::drop('goods_comments');
        Schema::drop('shopping_cart_items');
        Schema::drop('orders');
        Schema::drop('order_archive');
    }
}
