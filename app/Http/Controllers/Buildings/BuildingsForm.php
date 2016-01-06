<?php namespace App\Http\Controllers\Buildings;
use Processing\Form\Form;

class BuildingsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new BuildingsForm();
    }

    protected function setView()
    {
        $this->view('buildings.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Build');
    }

    protected function addControls()
    {
        $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('name')
                    ->caption('Nume Cladire')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('name')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('address')
                    ->caption('Adresa')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('address')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('locality')
                    ->caption('Localitatea')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('locality')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('county')
                    ->caption('Judetul')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('county')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('energy_responsable')
                    ->caption('Responsabil Energetic')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('energy_responsable')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('owner')
                    ->caption('Proprietar')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('owner')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('destination')
                    ->caption('Destinatia Principala')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('destination')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('type_building')
                    ->caption('Tipul Cladirii')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('type_building')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('year')
                    ->caption('Anul Constructiei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('year')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('designer')
                    ->caption('Proiectant')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('designer')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('builder')
                    ->caption('Constructor')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('builder')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('height')
                    ->caption('Regimul de Inaltime')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('height')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('structure_construct')
                    ->caption('Structura Constructiva')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('structure_construct')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
              ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('particularities')
                    ->caption('Particularitati')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('particularities')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
        ;      

    }
}