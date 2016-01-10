<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsListTable extends Migration
{
    public function up()
    {
        Schema::create('contracts_list', function(Blueprint $t)
        {
            $t->increments('id');
            $t->tinyinteger('counter_id');
            $t->integer('nr_contract');
            $t->datetime('signature_date');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('contracts_list');
    }
    
}