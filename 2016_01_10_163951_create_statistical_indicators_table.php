<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticalIndicatorsTable extends Migration
{
    public function up()
    {
        Schema::create('statistical_indicators', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('nr_indicator')->comment('Indicatori Statistici');
            $t->string('name')->comment('Localitate');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('statistical_indicators');
    }
    
}