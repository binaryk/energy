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
            $table->tinyinteger('vehicle_id');
            $table->string('year_faz');
            $table->string('month_faz');
            $table->string('month_distance');
            $table->string('monthly_consumption');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('consumptions');
    }
    
}