<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('value');
            $table->string('time');
            $table->string('date',10);
            $table->integer('user_id');
            $table->boolean('status')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_cart');
    }
}
