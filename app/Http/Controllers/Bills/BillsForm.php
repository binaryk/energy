<?php namespace App\Http\Controllers\Bills;

use App\Http\Controllers\Bills\BillsController;
use App\Models\Bill;
use Processing\Form\Form;

class BillsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new BillsForm();
    }

    protected function setView()
    {
        $this->view('bills.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Bill');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_bill')
                    ->caption('Nr Factura')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_bill')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

           ->addControl(
               \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                   ->name('type_bill')
                   ->caption('Tip Factura')
                   ->class('form-control data-source input-group form-select init-on-update-delete')
                   ->controlsource('type_bill')
                   ->controltype('combobox')
                   ->enabled('false')
                   ->options(Bill::tip())
           )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('consumption_billed')
                    ->caption('Consum Facturat')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('consumption_billed')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('value_witch_tva')
                    ->caption('Val Top cu T.V.A.')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('value_witch_tva')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('date_bill')
                    ->caption('Data Facturii')
                    ->class('form-control  data-source datepicker')
                    //->placeholder('Nume')
                    ->controlsource('date_bill')
                    ->controltype('textbox')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL])
            )
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('start_billing')
                    ->caption('Inceput Facturare')
                    ->class('form-control  data-source datepicker')
                    //->placeholder('Nume')
                    ->controlsource('start_billing')
                    ->controltype('textbox')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL])
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('stop_billing')
                    ->caption('Sfirsit Perioada Facturare')
                    ->class('form-control  data-source datepicker')
                    //->placeholder('Nume')
                    ->controlsource('stop_billing')
                    ->controltype('textbox')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL])
            )
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('super_power')
                    ->caption('Putere Cal Super')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('super_power')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.editboxes.editbox')
                    ->name('observations')
                    ->caption('Observatii')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('observations')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('nr_contract')
                    ->caption('Denumire Furnizor')
                    ->class('form-control data-source input-group form-select init-on-update-delete')
                    ->controlsource('nr_contract')
                    ->controltype('combobox')
                    ->enabled('false')
            )

        ;      

    }
}