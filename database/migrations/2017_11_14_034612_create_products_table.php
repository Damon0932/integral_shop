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
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('spec');
            $table->string('logo_url');
            $table->decimal('price', 10, 2);
            $table->decimal('integral', 10, 2);
            $table->boolean('on_sale')->default(0);
            $table->integer('sale_counts')->unsigned()->default(0);
            $table->integer('view_counts')->unsigned()->default(0);
            $table->integer('order')->nullable()->default(0);
            $table->integer('inventory')->unsigned()->nullable();
            $table->text('detail')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('product_banners', function (Blueprint $table) {
            // TODO 字段补全
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('banner_url');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
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
        Schema::table('product_banners', function (Blueprint $table) {
            $table->dropForeign('product_banners_product_id_foreign');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::dropIfExists('product_price_edit_logs');
        Schema::dropIfExists('product_edit_logs');
        Schema::dropIfExists('product_banners');
        Schema::dropIfExists('products');
    }
}
