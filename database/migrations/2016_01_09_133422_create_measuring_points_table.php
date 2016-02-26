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
            $t->string('address')->comment('Adresa Punct De Masurare');
            $t->string('locality')->comment('Localitate');
            $t->string('county')->comment('Judet');
            $t->integer('nlc')->comment('NLC');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('measuring_points');
    }
    
}