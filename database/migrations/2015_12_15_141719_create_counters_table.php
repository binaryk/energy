<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
    public function up()
    {
        Schema::create('counters', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('build_id');
            $table->integer('code');
            $table->integer('type_utility_id')->comment('gaze naturale, electricitate, apa');
            $table->integer('provider_id');
            $table->integer('client_code');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('counters');
    }
    
}