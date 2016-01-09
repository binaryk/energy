<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasuringPointsTable extends Migration
{
    public function up()
    {
        Schema::create('measuring_points', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('address');
            $t->string('locality');
            $t->string('county');
            $t->integer('nlc');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('measuring_points');
    }
    
}