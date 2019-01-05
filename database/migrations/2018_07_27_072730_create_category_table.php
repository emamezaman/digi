<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            
    $table->increments('id');
    $table->string('title_fa')->nullable();
    $table->string('title_en')->nullable();
    $table->unsignedInteger('parent_id')->nullable();
    $table->unsignedInteger('root_id')->nullable();
    $table->boolean('is_active')->default(true);
    $table->string('image')->nullable();
    $table->integer('depth')->nullable();
    $table->string('parents')->nullable();
    $table->string('display_order')->nullable();
        });
    }
   
                                               
        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
