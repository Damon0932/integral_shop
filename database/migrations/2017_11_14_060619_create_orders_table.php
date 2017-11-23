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
            $table->integer('customer_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('order_sn');
            $table->decimal('beans_fee')->default(0.00);
            $table->decimal('price_fee')->default(0.00);
            $table->tinyInteger('status')->default(0);
            $table->string('remark')->nullable();

            $table->string('shipping_no')->nullable();
            $table->string('address_phone', 20)->nullable();
            $table->string('address_name', 100)->nullable();
            $table->string('address_province')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_district', 50)->nullable();
            $table->text('address_detail')->nullable();
            $table->dateTime('delivered_at')->nullable();

            $table->timestamps();
            $table->softDeletes();


            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropForeign('orders_product_id_foreign');
        });
        Schema::dropIfExists('orders');
    }
}