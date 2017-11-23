<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeansLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beans_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->decimal('beans')->nullable();
            $table->decimal('integral')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('type')->nullable()->comment('1.兑换 2.消费');

            $table->integer('project_id')->unsigned()->nullable();
            $table->decimal('exchanged_rate')->nullable();

            $table->integer('order_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beans_logs', function (Blueprint $table) {
            $table->dropForeign('beans_logs_customer_id_foreign');
        });
        Schema::table('beans_logs', function (Blueprint $table) {
            $table->dropForeign('beans_logs_customer_id_foreign');
        });
        Schema::table('beans_logs', function (Blueprint $table) {
            $table->dropForeign('beans_logs_order_id_foreign');
        });
        Schema::dropIfExists('beans_logs');
    }
}
