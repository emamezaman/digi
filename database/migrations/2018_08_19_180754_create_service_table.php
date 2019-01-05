<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->string('date')->nullable();
            $table->integer('time')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('is_active')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
}
