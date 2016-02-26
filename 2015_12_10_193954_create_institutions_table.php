<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{

    public function up()
    {
        Schema::create('institutions', function(Blueprint $t)
        {
            $t->increments('id');
            $t->tinyinteger('category_id')->comment('Id Categorie');
            $t->string('name')->comment('Denumirea Institutiei');
            $t->string('address',100)->comment('Adresa');
            $t->string('locality')->comment('Localitatea');
            $t->string('county')->comment('Tara');
            $t->string('energy_responsable')->comment('Responsabil Energetic');
            $t->string('owner')->comment('Proprietar');
            $t->string('destination')->comment('Destinatia Principala');
            $t->string('type_building')->comment('Tipul Institutiei');
            $t->string('year',10)->comment('Anul Constructiei');
            $t->string('designer')->comment('Proiectant');
            $t->string('builder')->comment('Constructor');
            $t->integer('height')->comment('Regimul de Inaltime');
            $t->string('structure_construct')->comment('Structura Constructiva');
            $t->string('particularities')->comment('Particularitati');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
    
}
