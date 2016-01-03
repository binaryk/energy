<?php namespace App\Http\Controllers\Vehicles;
use Processing\Form\Form;

class VehiclesForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new VehiclesForm();
    }

    protected function setView()
    {
        $this->view('vehicles.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Vehicle');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('fleet_type')
                    ->caption('Tip Flota Auto')
                    ->class('form-control  data-source input-group form-select init-on-update-delete')
                    //->placeholder('Nume')
                    ->controlsource('fleet_type')
                    ->controltype('combobox')
                    ->options(\App\Models\Vehicle::fleet())
                    // ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('vehicle_type')
                    ->caption('Tip Vehicol')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('vehicle_type')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('license_plate_number')
                    ->caption('Numar De Inmatriculare')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('license_plate_number')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('property_type')
                    ->caption('Tip Propietate')
                    ->class('form-control  data-source input-group form-select init-on-update-delete')
                    //->placeholder('Nume')
                    ->controlsource('property_type')
                    ->controltype('combobox')
                    ->options(\App\Models\Vehicle::property())
                    // ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('fuel_type')
                    ->caption('Tip Combustibil Utilizat')
                    ->class('form-control  data-source input-group form-select init-on-update-delete')
                    //->placeholder('Nume')
                    ->controlsource('fuel_type')
                    ->controltype('combobox')
                    ->options(\App\Models\Vehicle::fuel())
                    // ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('capacity_cm3')
                    ->caption('Capacitate Cilindrica Cm3')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('capacity_cm3')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('year_of_manufacture')
                    ->caption('An Fabricatie')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('year_of_manufacture')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('function_type')
                    ->caption('Tip Functiune')
                    ->class('form-control  data-source input-group form-select init-on-update-delete')
                    //->placeholder('Nume')
                    ->controlsource('function_type')
                    ->controltype('combobox')
                    ->options(\App\Models\Vehicle::functions())
                    // ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('internal_consumption')
                    ->caption('Consum Mediu Intern')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('internal_consumption')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('external_consumption')
                    ->caption('Consum Mediu Extern')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('external_consumption')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('mixed_consumption')
                    ->caption('Consum Mediu Mixt')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('mixed_consumption')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
        ;      

    }
}

  