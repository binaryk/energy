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
            $t->integer('institution_id')->comment('Id Institutie');
            $t->string('name')->comment('Nume Cladire');
            $t->string('address')->comment('Adresa');
            $t->string('locality')->comment('Localitatea');
            $t->string('county')->comment('Judetul');
            $t->string('energy_responsable')->comment('Responsabil Energetic');
            $t->string('owner')->comment('Proprietar');
            $t->string('destination')->comment('Destinatia Principala');
            $t->string('type_building')->comment('Tipul Cladirii');
            $t->integer('year')->comment('Anul Constructiei');
            $t->string('designer')->comment('Proiectant');
            $t->string('builder')->comment('Constructor');
            $t->integer('height')->comment('Regimul de Inaltime');
            $t->string('structure_construct')->comment('Structura Constructiva');
            $t->string('particularities')->comment('Particularitati');
            $t->float('total_unfolded_area')->comment('Suprafata Totala Desfasurata Mp');
            $t->float('heated_surface')->comment('Suprafata Desfasurate Incalzita Mp');
            $t->float('built_surface_ground')->comment('Suprafata Construita La Sol Mp');
            $t->float('window_surface')->comment('Suprafata Totala Ferestre Exterioare Mp');
            $t->float('door_surface')->comment('Suprafata Usilor Exterioare Mp');
            $t->float('building_volume')->comment('Volum Total Cladire Mc');
            $t->float('heated_volume')->comment('Volum Incalzit Cladire Mc');
            $t->float('average_height')->comment('Inaltime Medie M');
            $t->string('exterior_walls')->comment('Pereti Exteriori');
            $t->float('thickness_extr_walls')->comment('Grosime Pereti Exteriori Mm');
            $t->float('insulation_extr_walls')->comment('Izolatie Pereti Exteriori Mn');
            $t->float('exterior_joiner_wood')->comment('Tamplarie Exterioara Termoizolanta Din Lemn Mp');
            $t->float('exterior_joiner_pvc')->comment('Tamplarie Exterioara Termoizolanta Din Pvc Mp');
            $t->float('exterior_joiner_aluminium')->comment('Tamplarie Exterioara Termoizolanta Din Al Mp');
            $t->float('exterior_joiner_simple_wood')->comment('Tamplarie Exterioara Termoizolanta Simpla Din Lemn Mp');
            $t->float('exterior_joiner_simple_metal')->comment('Tamplarie Exterioara Termoizolanta Simpla Metalica Mp');
            $t->float('exterior_joiner_double')->comment('Tamplarie Exterioara Termoizolanta Dubla Cuplata Din Lemn Mp');
            $t->string('terrace_state')->comment('Stare Acoperis Tip Terasa');
            $t->date('last_repair')->comment('Ultima Reparatie Terasa');
            $t->string('roof_condition')->comment('Stare Acoperisului Peste Pod');
            $t->float('roof_insulation')->comment('Izolatie Acoperis Mm');
            $t->string('plates_under_bridge')->comment('Planseu Sub Pod');
            $t->float('plates_insulation')->comment('Izolatie Planseu Mm');
            $t->string('plate_over_basement')->comment('Placa Peste Subsol Sol');
            $t->float('plate_over_basement_insulation')->comment('Izolatie Placa Peste Subsol Sol Mm');
            $t->string('energy_source')->comment('Sursa De Energie');
            $t->string('fuel_source')->comment('Sursa Proprie De Energie');
            $t->string('description_source')->comment('Descriere Sursa De Incalzire');
            $t->float('ctp_power')->comment('Ctp Putere Termica Instalata');
            $t->date('date_installation')->comment('Ctp Data Instalarii');
            $t->string('ctp_adjustment_system')->comment('Ctp Sistem Reglare Automatizare');
            $t->string('type_system')->comment('Tipul Sistemului De Incalzire');
            $t->string('description_heating_system')->comment('Descriere Tip De Incalzire');
            $t->string('hydraulic_adjustment')->comment('Reglaj Corpuri Statice Termic Higraulic');
            $t->string('description_hydraulic_adjs')->comment('Descriere Reglaj Termic Higraulic');
            $t->string('energy_source_')->comment('Sursa De Energie2');
            $t->string('fuel_source_')->comment('Sursa Proprie De Energie2');
            $t->string('description_source_')->comment('Descriere Sursa De Apa Calda');
            $t->float('sp_power')->comment('Sp Putere Termica Nominala');
            $t->date('date_installation_')->comment('Sp Data Instalarii');
            $t->string('type_system_')->comment('Tipul Sistemului');
            $t->string('description_type_system')->comment('Descriere Tip Sistem');
            $t->string('head_of_circulation')->comment('Conducta De Recirculare AA CC');
            $t->string('program_delivery')->comment('Program Livrare Apa Clda Ore/Zi');
            $t->string('program_end_week')->comment('Program Sfarsit De Saptamina Ore/Zi');
            $t->timestamps();
            $t->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
    
}
