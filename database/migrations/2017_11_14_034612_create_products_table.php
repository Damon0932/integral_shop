<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('keyword');
            $table->decimal('price', 10, 2);
            $table->decimal('integral', 10, 2);
            $table->boolean('on_sale')->default(0)->comment('1.上架 0.不上架 ');
            $table->integer('sale_counts')->unsigned();
            $table->integer('view_counts')->unsigned();
            $table->integer('weight')->nullable()->default(0)->comment('权重');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('product_details', function (Blueprint $table) {
            // TODO 字段补全
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('inventory')->unsigned()->nullable();
            $table->text('detail')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('product_edit_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('key');
            $table->string('value');
            $table->tinyInteger('type');// TODO
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('product_price_edit_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('remark')->nullable();
            $table->decimal('prime_integral', 10, 2);
            $table->decimal('integral', 10, 2);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // TODO SKU
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_price_edit_logs', function (Blueprint $table) {
            $table->dropForeign('product_price_edit_logs_product_id_foreign');
            $table->dropForeign('product_price_edit_logs_user_id_foreign');
        });
        Schema::table('product_edit_logs', function (Blueprint $table) {
            $table->dropForeign('product_edit_logs_product_id_foreign');
            $table->dropForeign('product_edit_logs_user_id_foreign');
        });
        Schema::table('product_details', function (Blueprint $table) {
            $table->dropForeign('product_details_product_id_foreign');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::dropIfExists('product_price_edit_logs');
        Schema::dropIfExists('product_edit_logs');
        Schema::dropIfExists('product_details');
        Schema::dropIfExists('products');
    }
}
