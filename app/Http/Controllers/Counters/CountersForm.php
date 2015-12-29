<?php namespace App\Http\Controllers\Counters;
use Processing\Form\Form;

class CountersForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new CountersForm();
    }

    protected function setView()
    {
        $this->view('counters.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Counter');
    }

    protected function addControls()
    {
        $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('code')
                    ->caption('Cod Contor')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('code')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('type_utility')
                    ->caption('Tip Utilizare')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('type_utility')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('name_supplier')
                    ->caption('Denumire Furnizor')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('name_supplier')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )
             ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('code_client')
                ->caption('Cod Client')
                ->class('form-control  data-source')
                //->placeholder('Nume')
                ->controlsource('code_client')
                ->controltype('textbox')
                ->maxlength(255)

                
        )
        ;

    }
}