<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
   public function up()
    {
        Schema::create('buildings', function(Blueprint $t)
        {
            $t->increments('id');
            $t->integer('institution_id');
            $t->string('name');
            $t->string('address');
            $t->string('locality');
            $t->string('county');
            $t->string('energy_responsable');
            $t->string('owner');
            $t->string('destination');
            $t->string('type_building');
            $t->integer('year');
            $t->string('designer');
            $t->string('builder');
            $t->integer('height');
            $t->string('structure_construct');
            $t->string('particularities');
            $t->float('total_unfolded_area');
            $t->float('heated_surface');
            $t->float('built_surface_ground');
            $t->float('window_surface');
            $t->float('door_surface');
            $t->float('building_volume');
            $t->float('heated_volume');
            $t->float('average_height');
            $t->string('exterior_walls');
            $t->float('thickness_extr_walls');
            $t->float('insulation_extr_walls');
            $t->float('exterior_joiner_wood');
            $t->float('exterior_joiner_pvc');
            $t->float('exterior_joiner_aluminium');
            $t->float('exterior_joiner_simple_wood');
            $t->float('exterior_joiner_simple_metal');
            $t->float('exterior_joiner_double');
            $t->string('terrace_state');
            $t->date('last_repair');
            $t->string('roof_condition');
            $t->float('roof_insulation');
            $t->string('plates_under_bridge');
            $t->float('plates_insulation');
            $t->string('plate_over_basement');
            $t->float('plate_over_basement_insulation');
            $t->string('energy_source');
            $t->string('fuel_source');
            $t->string('description_source');
            $t->float('ctp_power');
            $t->date('date_installation');
            $t->string('ctp_adjustment_system');
            $t->string('type_system');
            $t->string('description_heating_system');
            $t->string('hydraulic_adjustment');
            $t->string('description_hydraulic_adjs');
            $t->string('energy_source_');
            $t->string('fuel_source_');
            $t->string('description_source_');
            $t->float('sp_power');
            $t->date('date_installation_');
            $t->string('type_system_');
            $t->string('description_type_system');
            $t->string('head_of_circulation');
            $t->string('program_delivery');
            $t->string('program_end_week');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
    
}
