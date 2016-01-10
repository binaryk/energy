<?php namespace App\Http\Controllers\Publiclighting;
// use App\Http\Controllers\Publiclighting\PubliclightingController;
use App\Models\Light;
use Processing\Form\Form;

class PubliclightingForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new PubliclightingForm();
    }

    protected function setView()
    {
        $this->view('public_enlightments.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Light');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('provider_id')
                    ->caption('Denumire Furnizor')
                    ->class('form-control data-source input-group form-select init-on-update-delete')
                    ->controlsource('provider_id')
                    ->controltype('combobox')
                    ->enabled('false')
                    ->options(['0' => '-- Selectati furnizor --'] + PubliclightingController::furnizori())
            )
            ->addControl(
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('measuring_point')
                    ->caption('Denumire Furnizor')
                    ->class('form-control data-source input-group form-select init-on-update-delete')
                    ->controlsource('measuring_point')
                    ->controltype('combobox')
                    ->enabled('false')
                    ->options(['0' => '-- Selectati punctul de masurare --'] + PubliclightingController::points())
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_bill')
                    ->caption('Numar Factura')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_bill')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('date_of_issue')
                    ->caption('Data Emiterii Facturii')
                    ->class('form-control  data-source datepicker')
                    //->placeholder('Nume')
                    ->controlsource('date_of_issue')
                    ->controltype('textbox')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL])
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('ective_energy')
                    ->caption('Consum Energie Electrica Activa In Kwh')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('ective_energy')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('inductive_reactive_energy')
                    ->caption('Consum Energie Electrica Reactiva Inductiva In Kwh')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('inductive_reactive_energy')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('capacitive_reactive_energy')
                    ->caption('Consum Energie Electrica Reactiva Capacitiva In Kwh')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('capacitive_reactive_energy')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('total_payment')
                    ->caption('Total De Plata Factura Curenta')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('total_payment')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
        ;      

    }
}