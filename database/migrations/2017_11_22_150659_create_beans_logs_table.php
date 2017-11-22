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
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->decimal('exchanged_rate')->default(1);
            $table->decimal('beans');
            $table->decimal('integral');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('beans_logs');
    }
}
