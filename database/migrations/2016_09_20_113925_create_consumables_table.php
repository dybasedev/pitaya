<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('名称');
            $table->integer('provider_id')->unsigned()->index()->comment('供应商 ID');
            $table->integer('category_id')->unsigned()->index()->comment('分类 ID');
            $table->text('description')->comment('描述');
            $table->integer('maximum_price')->unsigned()->nullable()->comment('最高价格');
            $table->integer('minimal_price')->unsigned()->nullable()->comment('最低价格');
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
        Schema::dropIfExists('consumables');
    }
}
