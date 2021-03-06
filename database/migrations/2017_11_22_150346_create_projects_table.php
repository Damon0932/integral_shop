<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name_en')->nullable();
            $table->string('project_name_cn')->nullable();
            $table->tinyInteger('status')->default(0)->comment('状态 0.不启用 1.启用');
            $table->decimal('exchange_rate')->default(1);
            $table->string('ip')->nullable();
            $table->string('redis_key')->nullable();
            $table->string('hash_key')->nullable();
            $table->string('api_url_exchange_point')->nullable();
            $table->string('api_private_key')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
