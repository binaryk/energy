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
            $table->integer('name');
            $table->string('type_utility');
            $table->string('name_supplier');
            $table->integer('code_client');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('counters');
    }
    
}