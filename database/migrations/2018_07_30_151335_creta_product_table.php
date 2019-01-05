<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('title_url')->nullable();
            $table->string('code')->nullable();
            $table->string('code_url')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discounts')->nullable();
            $table->integer('view')->default(0);
            $table->text('text')->nullable();
            $table->text('description')->nullable();
            $table->integer('bon')->nullable();
            $table->boolean('product_status')->default(0);
            $table->boolean('show_product')->default(0);
            $table->boolean('special')->default(0);
            $table->integer('product_number')->default(0);
            $table->integer('order_product')->default(0);
            $table->text('keyword')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->integer('like')->nullable();
            $table->integer('deslike')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('product');
    }
}
