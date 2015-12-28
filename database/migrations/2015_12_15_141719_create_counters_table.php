<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
    public function up()
    {
        Schema::create('counters', function($table)
        {
            $table->increments('id');
            $table->integer('build_id');
            $table->integer('code');
            $table->string('type_utility_id')->comment('gaze naturale, electricitate, apa');
            $table->string('provider_id');
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