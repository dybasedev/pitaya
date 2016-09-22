<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->nullable()->unsigned()->index()->comment('订单 ID');
            $table->string('order_number')->nullable()->index()->comment('订单号');
            $table->integer('consumable_id')->unsigned()->index()->comment('SPU ID');
            $table->string('consumable_name')->index()->comment('SPU 名称');
            $table->integer('consumable_specification_id')->index()->unsigned()->comment('SKU ID');
            $table->integer('original_price')->comment('原价');
            $table->integer('actual_price')->comment('实际价格');
            $table->integer('amount')->unsigned()->comment('数量');
            $table->text('cache')->comment('缓存');
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
        Schema::dropIfExists('order_items');
    }
}
