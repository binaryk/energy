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
            $t->text('address',100);
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
        Schema::dropIfExists('institutions');
    }
    
}
