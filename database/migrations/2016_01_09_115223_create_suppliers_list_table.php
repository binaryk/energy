<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersListTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers_list', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('name');
            $t->integer('type');
            $t->string('unit_measurement');
            $t->string('address');
            $t->string('locality');
            $t->string('county');
            $t->string('email');
            $t->string('phone');
            $t->string('fax');
            $t->string('contact_person');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('suppliers_list');
    }
    
}