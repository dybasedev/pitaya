<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number')->unique()->nullable()->comment('订单号');
            $table->integer('purchaser_id')->unsigned()->index()->comment('消费者 ID');
            $table->integer('provider_id')->unsigned()->index()->comment('供应商 ID');
            $table->char('status', 4)->index()->nullable()->comment('订单状态');
            $table->integer('total_sum')->unsigned()->index()->nullable()->comment('订单总价');
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
        Schema::dropIfExists('orders');
    }
}
