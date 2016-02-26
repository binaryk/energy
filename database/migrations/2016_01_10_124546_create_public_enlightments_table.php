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
            $t->integer('provider_id')->comment('Id Furnizor');
            $t->integer('measuring_point')->comment('Punctul de Masurare');
            $t->integer('nr_bill')->comment('Numar Factura');
            $t->datetime('date_of_issue')->comment('Data Emiterii Facturii');
            $t->float('ective_energy')->comment('Consum Energie Electrica Activa In Kwh');
            $t->float('inductive_reactive_energy')->comment('Consum Energie Electrica Reactiva Inductiva In Kwh');
            $t->float('capacitive_reactive_energy')->comment('Consum Energie Electrica Reactiva Capacitiva In Kwh');
            $t->float('total_payment')->comment('Total De Plata Factura Curenta');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('public_enlightments');
    }
    
}
