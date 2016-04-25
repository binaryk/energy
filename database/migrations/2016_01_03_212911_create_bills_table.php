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
            $table->string('nr_contract')->comment('Nr Contract');
            $table->string('nr_bill')->comment('Nr Factura');
            $table->integer('type_bill')->comment('Tip Factura');
            $table->float('consumption_billed')->comment('Consum Facturat');
            $table->float('value_witch_tva')->comment('Val Top cu T.V.A.');
            $table->date('date_bill')->comment('Data Facturii');
            $table->date('start_billing')->comment('Inceput Facturare');
            $table->date('stop_billing')->comment('Sfirsit Perioada Facturare');
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