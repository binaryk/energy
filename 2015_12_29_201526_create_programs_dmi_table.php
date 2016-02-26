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
            $t->string('address')->comment('Adresa');
            $t->string('locality')->comment('Localitate');
            $t->string('county')->comment('Judet');
            $t->string('owner')->comment('Proiectant');
            $t->decimal('nr_project', 20, 2)->comment('Nr Proiect');
            $t->integer('realization_year')->comment('Anul Realizarii Proiectului');
            $t->string('nr_hcl')->comment('Nr Hcl Aprobare');
            $t->string('destin_building')->comment('Destinatia Cladirii');
            $t->string('commercial_spaces')->comment('Spatii Comerciale La Parter');
            $t->integer('year_of_construction')->comment('Anul Constructiei Cladirii');
            $t->string('height')->comment('Regim Inaltime');
            $t->integer('nr_apartment')->comment('Nr Apartamente');
            $t->decimal('kitchen_area', 20, 2)->comment('Suprafata Utila');
            $t->string('energy_source')->comment('Sursa Energie Termica');
            $t->string('fuel_type')->comment('Tip Combustibil Utilizat');
            $t->integer('nr_cpe_initially')->comment('Numar Cpe Initial');
            $t->integer('heated_area')->comment('Suprafata Incalzita Din Cpe');
            $t->string('initially_energy_note')->comment('Nota Energetica Initiala');
            $t->string('initially_energy_class')->comment('Clasa Energetica Initiala');
            $t->integer('annual_consumption')->comment('Consum Anual Specific De Energie Initial');
            $t->integer('annual_consumption_for_heating')->comment('Consum Anual Pentru Incalzire Initial');
            $t->integer('emission_index_co2')->comment('Indice De Emisie Echivalent CO2 Initial');
            $t->string('restored_energy_note')->comment('Nota Energetica Reabilitata');
            $t->string('restored_energy_class')->comment('Clasa Energetica Reabilitata');
            $t->integer('annual_consumption_restored')->comment('Consum Anual De Energie Reabilitat');
            $t->integer('annual_consumption_for_heating_restored')->comment('Consum Anual Pentru Incalzire Reabilitat');
            $t->integer('emission_index_co2_restored')->comment('Indice De Emisii Echivalent CO2 Reabilitata');
            $t->integer('annual_economy')->comment('Economia Anuala De Energie');
            $t->integer('total_investments')->comment('Valoarea Total A Investitiei Cu Tva Mii Lei');
            $t->integer('cm_witch_tva')->comment('CM Cu Tva Mii Lei');
            $t->string('specific_investment')->comment('Investitia Specifica CMS Utila Lei');
            $t->string('exchange_rate')->comment('Cursul Valutar Lei->Euro');
            $t->datetime('data_exchenge_rate')->comment('Data Cursului Valutar');
            $t->integer('duration_works')->comment('Durata Lucrarilor Luni');
            $t->integer('duration_recovery')->comment('Durata De Recuparare Ani');
            $t->string('investments_stage')->comment('Stadiul Implementarii Investitiei');
            $t->integer('data_termination_works')->comment('Data Pv Terminarea Lucrarii');
            $t->string('observations')->comment('Observatii');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs_dmi');
        
    }
}