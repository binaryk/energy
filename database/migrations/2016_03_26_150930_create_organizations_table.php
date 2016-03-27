<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('organizations', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('name');
            $t->string('address');
            $t->string('cui')->comment('Cod Unic De Identitate');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
    
}