<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
   public function up()
    {
        Schema::create('buildings', function($table)
        {
            $table->increments('id');
            $table->integer('institution_id');
            $table->string('name');
            $table->string('street');
            $table->integer('nr');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
    
}
