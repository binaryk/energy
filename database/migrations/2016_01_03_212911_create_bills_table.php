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
            $table->integer('nr_bill');
            $table->integer('type_bill');
            $table->float('consumption_billed');
            $table->float('value_witch_tva');
            $table->datetime('date_bill');
            $table->datetime('start_billing');
            $table->datetime('stop_billing');
            $table->float('super_power');
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