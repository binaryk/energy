<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumptionsTable extends Migration
{
    public function up()
    {
        Schema::create('consumptions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->tinyinteger('vehicle_id')->comment('Id Vehicol');
            $table->string('year_faz')->comment('An Faz');
            $table->string('month_faz')->comment('Luna Faz');
            $table->string('month_distance')->comment('Distanta Lunara Parcursa In Km');
            $table->string('monthly_consumption')->comment('Consumul Total Pe Luna In Litri');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('consumptions');
    }
    
}