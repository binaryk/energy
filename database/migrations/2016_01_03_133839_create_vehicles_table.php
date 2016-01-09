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
            $table->string('fleet_type');
            $table->string('vehicle_type');
            $table->string('license_plate_number');
            $table->string('property_type');
            $table->string('fuel_type');
            $table->float('capacity_cm3');
            $table->integer('year_of_manufacture');
            $table->string('function_type');
            $table->float('internal_consumption');
            $table->floatfloat('external_consumption');
            $table->float('mixed_consumption');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
    
}