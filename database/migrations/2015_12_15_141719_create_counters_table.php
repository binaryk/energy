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
            $table->integer('build_id')->comment('Id Cladire');
            $table->string('code')->comment('Cod Contor');
            $table->integer('type_utility_id')->comment('Tip Utilizare:gaze naturale, electricitate, apa');
            $table->integer('provider_id')->comment('Denumire Furnizor');
            $table->string('client_code')->comment('Cod Client');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('counters');
    }
    
}