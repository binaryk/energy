<?php namespace App\Http\Controllers\Contracts;
use Processing\Form\Form;

class ContractsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new ContractsForm();
    }

    protected function setView()
    {
        $this->view('contracts_list.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Contract');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_contract')
                    ->caption('Numar Contract')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_contract')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('signature_date')
                    ->caption('Data Cursului Valutar')
                    ->class('form-control  data-source datepicker')
                    //->placeholder('Nume')
                    ->controlsource('signature_date')
                    ->controltype('textbox')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL])
            )             
        ;      

    }
}