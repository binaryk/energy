<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function(Blueprint $table)
        {
            $table->increments('id');
            $table->tinyinteger('counter_id');
            $table->string('nr_bill');
            $table->string('type_bill');
            $table->string('consumption_billed');
            $table->string('value_witch_tva');
            $table->string('date_bill');
            $table->string('start_billing');
            $table->string('stop_billing');
            $table->string('super_power');
            $table->string('observations');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bills');
    }
    
}