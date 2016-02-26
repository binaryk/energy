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
            $t->string('name')->comment('Denumire Furnizor');
            $t->integer('type')->comment('Tip Furnizor De Utilitati');
            $t->string('unit_measurement')->comment('Unitatea De Masura A Energiei');
            $t->string('address')->comment('Adresa');
            $t->string('locality')->comment('Localitatea');
            $t->string('county')->comment('Judetul');
            $t->string('email')->comment('E-Mail');
            $t->string('phone')->comment('Telefon');
            $t->string('fax')->comment('Fax');
            $t->string('contact_person')->comment('Persoana De Contact');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('suppliers_list');
    }
    
}