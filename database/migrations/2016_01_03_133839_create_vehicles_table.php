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
            $table->string('capacity_cm3');
            $table->string('year_of_manufacture');
            $table->string('function_type');
            $table->string('internal_consumption');
            $table->string('external_consumption');
            $table->string('mixed_consumption');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
    
}