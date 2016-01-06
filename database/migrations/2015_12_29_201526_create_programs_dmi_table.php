<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsDmiTable extends Migration
{
    public function up()
    {
        Schema::create('programs_dmi', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('address');
            $t->string('locality');
            $t->string('county');
            $t->string('owner');
            $t->decimal('nr_project', 20, 2);
            $t->integer('realization_year');
            $t->string('nr_hcl');
            $t->string('destin_building');
            $t->string('commercial_spaces');
            $t->integer('year_of_construction');
            $t->string('height');
            $t->integer('nr_apartment');
            $t->decimal('kitchen_area', 20, 2);
            $t->string('energy_source');
            $t->string('fuel_type');
            $t->integer('nr_cpe_initially');
            $t->integer('heated_area');
            $t->string('initially_energy_note');
            $t->string('initially_energy_class');
            $t->integer('annual_consumption');
            $t->integer('annual_consumption_for_heating');
            $t->integer('emission_index_co2');
            $t->string('restored_energy_note');
            $t->string('restored_energy_class');
            $t->integer('annual_consumption_restored');
            $t->integer('annual_consumption_for_heating_restored');
            $t->integer('emission_index_co2_restored');
            $t->integer('annual_economy');
            $t->integer('total_investments');
            $t->integer('cm_witch_tva');
            $t->string('specific_investment');
            $t->string('exchange_rate');
            $t->date('data_exchenge_rate');
            $t->integer('duration_works');
            $t->integer('duration_recovery');
            $t->string('investments_stage');
            $t->integer('data_termination_works');
            $t->string('observations');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs_dmi');
        
    }
}