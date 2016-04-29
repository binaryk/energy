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
            $t->string('locality')->comment('Localitatea'); 
            $t->timestamps();
            $t->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
    
}
