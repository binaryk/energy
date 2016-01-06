<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
   public function up()
    {
        Schema::create('buildings', function(Blueprint $t)
        {
            $t->increments('id');
            $t->integer('institution_id');
            $t->string('name');
            $t->string('street');
            $t->string('locality');
            $t->string('country');
            $t->string('energy_responsable');
            $t->string('owner');
            $t->string('destination');
            $t->string('type_building');
            $t->string('year',10);
            $t->string('designer');
            $t->string('builder');
            $t->integer('height');
            $t->string('structure_construct');
            $t->string('particularities');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
    
}
