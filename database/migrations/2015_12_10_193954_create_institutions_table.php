<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{

    public function up()
    {
        Schema::create('institutions', function($t)
        {
            $t->increments('id');
            $t->tinyinteger('category_id');
            $t->string('name');
            $t->string('address',100);
            $t->string('locality');
            $t->string('country');
            $t->string('energy_responsable');
            $t->string('owner');
            $t->string('destination');
            $t->string('type_building');
            $t->string('year',10);
            $t->string('designer');
            $t->string('builder');
            $t->string('height');
            $t->string('structure_construct');
            $t->string('particularities');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
    
}
