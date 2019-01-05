<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('full_name')->nullable();
            $table->unsignedInteger('ostan_id')->nullable();
            $table->unsignedInteger('shar_id')->nullable();
            $table->string('phone',11)->nullable();
            $table->string('city_code',10)->nullable();
            $table->string('mobile',11)->nullable();
            $table->string('zip_code',10)->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('=user_address');
    }
}
