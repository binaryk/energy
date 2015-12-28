<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeInfrastructuresTable extends Migration
{
  public function up()
    {
        Schema::create('power_type', function($t)
        {
            $t->increments('id');
            $t->string('name');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('power_type');
    }
    
}