<?php namespace App\Http\Controllers\Programoug;
use Processing\Form\Form;

class ProgramougForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new ProgramougForm();
    }

    protected function setView()
    {
        $this->view('programs_oug.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Program_oug');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('number')
                    ->caption('Numar')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('number')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('street')
                    ->caption('Strada')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('street')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('locality')
                    ->caption('Localitate')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('locality')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('county')
                    ->caption('Judet')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('county')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('country')
                    ->caption('Tara')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('country')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('owner')
                    ->caption('Proiectant')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('owner')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_project')
                    ->caption('Nr Proiect')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_project')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('realization_year')
                    ->caption('Anul Realizarii Proiectului')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('realization_year')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_hcl')
                    ->caption('Nr Hcl Aprobare')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_hcl')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('destin_building')
                    ->caption('Destinatia Cladirii')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('destin_building')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('commercial_spaces')
                    ->caption('Spatii Comerciale La Parter')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('commercial_spaces')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('year_of_construction')
                    ->caption('Anul Constructiei Cladirii')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('year_of_construction')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('height')
                    ->caption('Regim Inaltime')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('height')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_apartment')
                    ->caption('Nr Apartamente')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_apartment')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

               ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('kitchen_area')
                    ->caption('Suprafata Utila')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('kitchen_area')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('energy_source')
                    ->caption('Sursa Energie Termica')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('energy_source')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('fuel_type')
                    ->caption('Tip Combustibil Utilizat')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('fuel_type')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_cpe_initially')
                    ->caption('Numar Cpe Initial')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_cpe_initially')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('heated_area')
                    ->caption('Suprafata Incalzita Din Cpe')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('heated_area')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('initially_energy_note')
                    ->caption('Nota Energetica Initiala')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('initially_energy_note')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('initially_energy_class')
                    ->caption('Clasa Energetica Initiala')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('initially_energy_class')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('annual_consumption')
                    ->caption('Consum Anual Specific De Energie Initial')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('annual_consumption')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('annual_consumption_for_heating')
                    ->caption('Consum Anual Specific Pentru Incalzire Initial')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('annual_consumption_for_heating')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('emission_index_co2')
                    ->caption('Indice De Emisie Echivalent CO2 Initial')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('emission_index_co2')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('restored_energy_note')
                    ->caption('Nota Energetica Reabilitata')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('restored_energy_note')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('restored_energy_class')
                    ->caption('Clasa Energetica Reabilitata')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('restored_energy_class')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('annual_consumption_restored')
                    ->caption('Consum Anual Specific De Energie Reabilitat')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('annual_consumption_restored')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('annual_consumption_for_heating_restored')
                    ->caption('Consum Anual Specific Pentru Incalzire Reabilitat')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('annual_consumption_for_heating_restored')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('emission_index_co2_restored')
                    ->caption('Indice De Emisii Echivalent CO2 Reabilitata')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('emission_index_co2_restored')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('annual_economy')
                    ->caption('Economia Anuala De Energie')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('annual_economy')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('total_investments')
                    ->caption('Valoarea Total A Investitiei Cu Tva Mii Lei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('total_investments')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('cm_witch_tva')
                    ->caption('CM Cu Tva Mii Lei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('cm_witch_tva')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('specific_investment')
                    ->caption('Investitia Specifica CMS Utila Lei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('specific_investment')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('exchange_rate')
                    ->caption('Cursul Valutar Lei->Euro')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('exchange_rate')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('data_exchenge_rate')
                    ->caption('Data Cursului Valutar')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('data_exchenge_rate')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('duration_works')
                    ->caption('Durata Lucrarilor Luni')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('duration_works')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('duration_recovery')
                    ->caption('Durata De Recuparare Ani')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('duration_recovery')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('investments_stage')
                    ->caption('Stadiul Implementarii Investitiei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('investments_stage')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('data_termination_works')
                    ->caption('Data Pv Terminarea Lucrarii')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('data_termination_works')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('observations')
                    ->caption('Observatii')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('observations')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            
        ;      

    }
}