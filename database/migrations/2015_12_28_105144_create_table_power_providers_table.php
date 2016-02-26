<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePowerProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_providers', function(Blueprint $t) {
            $t->increments('id');
            $t->integer('power_type_id')->comment('Id Tip Energie');
            $t->string('name',100)->comment('Nume Furnizor Energetic');
            $t->softdeletes();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('power_providers');
    }
}
