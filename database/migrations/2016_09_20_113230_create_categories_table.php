<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->unsigned()->index()->default(0)->comment('父 ID');

            $table->string('name')->unique()->comment('全局唯一名称、标识符');
            $table->string('display_name')->index()->comment('展示名称');
            $table->string('keywords')->index()->default('')->comment('关键字');

            $table->boolean('has_children')->default(false)->index()->comment('是否存在子类');

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
        Schema::dropIfExists('categories');
    }
}
