<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmazingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Amazing', function (Blueprint $table) {
             $table->increments('id');
             $table->string('m_title')->nullable();
             $table->string('title')->nullable();
             $table->text('tozihat')->nullable();
             $table->integer('price1')->nullable();
             $table->integer('price2')->nullable();
             $table->integer('time')->nullable();
             $table->integer('timeStamp')->nullable();
             $table->bollean('is_active')->default(0)->nullable();
             $table->unsignedInteger('product_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Amazing');
    }
}
