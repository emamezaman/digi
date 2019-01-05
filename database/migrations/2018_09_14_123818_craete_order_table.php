<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id');
            $table->integer('user_id');
            $table->integer('time');
            $table->string('date');//tarikhe sabte sefaresh
            $table->smallInteger('send_order_type');//shiveye ersal sefaresh 
            $table->smallInteger('pay_type');//shiveye pardakhte mablagh
            $table->boolean('pay_status')->default(0);//vaziyate pardakhte
            $table->smallInteger('order_status');//vaziyate sefaresh
            $table->integer('total_price');//mablaghe kol
            $table->integer('price');//mablaghe ba takhfif
            $table->string('order_code')->nullable();
            $table->string('code1')->nullable();
            $table->string('code2')->nullable();
            $table->boolean('order_read')->default(false);//khande shode ya adame khandan modir
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
