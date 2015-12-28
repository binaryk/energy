<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
   public function up()
    {
        Schema::create('buildings', function($t)
        {
            $t->increments('id');
            $t->integer('institution_id');
            $t->string('name');
            $t->string('street');
            $t->text('locality');
            $t->text('country');
            $t->text('energy_responsable');
            $t->text('owner');
            $t->text('destination');
            $t->text('type_building');
            $t->text('year',10);
            $t->text('designer');
            $t->text('builder');
            $t->text('height');
            $t->text('structure_construct');
            $t->text('particularities');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
    
}
