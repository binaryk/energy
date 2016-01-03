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
            $t->string('nr_project');
            $t->string('realization_year');
            $t->string('nr_hcl');
            $t->string('destin_building');
            $t->string('commercial_spaces');
            $t->string('year_of_construction');
            $t->string('height');
            $t->string('nr_apartment');
            $t->string('kitchen_area');
            $t->string('energy_source');
            $t->string('fuel_type');
            $t->string('nr_cpe_initially');
            $t->string('heated_area');
            $t->string('initially_energy_note');
            $t->string('initially_energy_class');
            $t->string('annual_consumption');
            $t->string('annual_consumption_for_heating');
            $t->string('emission_index_co2');
            $t->string('restored_energy_note');
            $t->string('restored_energy_class');
            $t->string('annual_consumption_restored');
            $t->string('annual_consumption_for_heating_restored');
            $t->string('emission_index_co2_restored');
            $t->string('annual_economy');
            $t->string('total_investments');
            $t->string('cm_witch_tva');
            $t->string('specific_investment');
            $t->string('exchange_rate');
            $t->string('data_exchenge_rate');
            $t->string('duration_works');
            $t->string('duration_recovery');
            $t->string('investments_stage');
            $t->string('data_termination_works');
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