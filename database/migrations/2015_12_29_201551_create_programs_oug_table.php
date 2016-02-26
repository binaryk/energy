<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsOugTable extends Migration
{
    public function up()
    {
        
    Schema::create('programs_oug', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('address')->comment('Adresa');
            $t->string('locality')->comment('Localitate');
            $t->string('county')->comment('Judet');
            $t->string('owner')->comment('Proiectant');
            $t->string('nr_project')->comment('Nr Proiect');
            $t->string('realization_year')->comment('Anul Realizarii Proiectului');
            $t->string('nr_hcl')->comment('Nr Hcl Aprobare');
            $t->string('destin_building')->comment('Destinatia Cladirii');
            $t->string('commercial_spaces')->comment('Spatii Comerciale La Parter');
            $t->string('year_of_construction')->comment('Anul Constructiei Cladirii');
            $t->string('height')->comment('Regim Inaltime');
            $t->string('nr_apartment')->comment('Nr Apartamente');
            $t->string('kitchen_area')->comment('Suprafata Utila');
            $t->string('energy_source')->comment('Sursa Energie Termica');
            $t->string('fuel_type')->comment('Tip Combustibil Utilizat');
            $t->string('nr_cpe_initially')->comment('Numar Cpe Initial');
            $t->string('heated_area')->comment('Suprafata Incalzita Din Cpe');
            $t->string('initially_energy_note')->comment('Nota Energetica Initiala');
            $t->string('initially_energy_class')->comment('Clasa Energetica Initiala');
            $t->string('annual_consumption')->comment('Consum Anual Specific De Energie Initial');
            $t->string('annual_consumption_for_heating')->comment('Consum Anual Pentru Incalzire Initial');
            $t->string('emission_index_co2')->comment('Indice De Emisie Echivalent CO2 Initial');
            $t->string('restored_energy_note')->comment('Nota Energetica Reabilitata');
            $t->string('restored_energy_class')->comment('Clasa Energetica Reabilitata');
            $t->string('annual_consumption_restored')->comment('Consum Anual De Energie Reabilitat');
            $t->string('annual_consumption_for_heating_restored')->comment('Consum Anual Pentru Incalzire Reabilitat');
            $t->string('emission_index_co2_restored')->comment('Indice De Emisii Echivalent CO2 Reabilitata');
            $t->string('annual_economy')->comment('Economia Anuala De Energie');
            $t->string('total_investments')->comment('Valoarea Total A Investitiei Cu Tva Mii Lei');
            $t->string('cm_witch_tva')->comment('CM Cu Tva Mii Lei');
            $t->string('specific_investment')->comment('Investitia Specifica CMS Utila Lei');
            $t->string('exchange_rate')->comment('Cursul Valutar Lei->Euro');
            $t->datetime('data_exchenge_rate')->comment('Data Cursului Valutar');
            $t->string('duration_works')->comment('Durata Lucrarilor Luni');
            $t->string('duration_recovery')->comment('Durata De Recuparare Ani');
            $t->string('investments_stage')->comment('Stadiul Implementarii Investitiei');
            $t->string('data_termination_works')->comment('Data Pv Terminarea Lucrarii');
            $t->string('observations')->comment('Observatii');
            $t->timestamps();
            $t->softDeletes();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs_oug');
        
    }
}
