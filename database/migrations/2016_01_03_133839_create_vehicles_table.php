<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('fleet_type')->comment('Tip Flota Auto');
            $table->string('vehicle_type')->comment('Tip Vehicol');
            $table->string('license_plate_number')->comment('Numar De Inmatriculare');
            $table->string('property_type')->comment('Tip Propietate');
            $table->string('fuel_type')->comment('Tip Combustibil Utilizat');
            $table->float('capacity_cm3')->comment('Capacitate Cilindrica Cm3');
            $table->integer('year_of_manufacture')->comment('An Fabricatie');
            $table->string('function_type')->comment('Tip Functiune');
            $table->float('internal_consumption')->comment('Consum Mediu Intern');
            $table->float('external_consumption')->comment('Consum Mediu Extern');
            $table->float('mixed_consumption')->comment('Consum Mediu Mixt');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
    
}