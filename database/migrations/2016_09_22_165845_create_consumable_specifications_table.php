<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumableSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumable_id')->index()->unsigned()->comment('SPU ID');
            $table->integer('actual_price')->unsigned()->comment('实际价格,单位为分');
            $table->integer('stock')->unsigned()->nullable()->comment('库存');
            $table->string('unit')->nullable()->comment('SKU单位');
            $table->string('specification')->nullable()->comment('规格');
            $table->string('specification_map')->nullable()->index()->comment('规格map');
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
        Schema::dropIfExists('consumable_specifications');
    }
}
