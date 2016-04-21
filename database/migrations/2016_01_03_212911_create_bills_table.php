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
            $table->tinyinteger('counter_id')->comment('Id Contor');
            $table->string('nr_contract')->comment('Nr Factura');
            $table->integer('nr_bill')->comment('Tip Factura');
            $table->integer('type_bill')->comment('Consum Facturat');
            $table->float('consumption_billed')->comment('Val Top cu T.V.A.');
            $table->float('value_witch_tva')->comment('Data Facturii');
            $table->datetime('date_bill')->comment('Inceput Facturare');
            $table->datetime('start_billing')->comment('Sfirsit Perioada Facturare');
            $table->datetime('stop_billing')->comment('Putere Cal Super');
            $table->string('u_m')->comment('Unitate de Masura'); 
            $table->timestamps();
            $table->softDeletes();
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bills');
    }
    
}