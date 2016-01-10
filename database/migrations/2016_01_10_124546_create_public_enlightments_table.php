<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicEnlightmentsTable extends Migration
{
    public function up()
    {
        Schema::create('public_enlightments', function(Blueprint $t)
        {
            $t->increments('id');
            $t->integer('provider_id');
            $t->integer('measuring_point');
            $t->integer('nr_bill');
            $t->datetime('date_of_issue');
            $t->float('ective_energy');
            $t->float('inductive_reactive_energy');
            $t->float('capacitive_reactive_energy');
            $t->float('total_payment');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('public_enlightments');
    }
    
}
