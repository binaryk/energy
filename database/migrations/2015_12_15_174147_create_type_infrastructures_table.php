<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeInfrastructuresTable extends Migration
{
  public function up()
    {
        Schema::create('type_infrastructures', function($table)
        {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('type_infrastructures');
    }
    
}