<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{

    public function up()
    {
        Schema::create('institutions', function($table)
        {
            $table->increments('id');
            $table->integer('infrastructure_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
    
}
