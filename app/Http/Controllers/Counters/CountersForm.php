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
                    ->class('form-control  data-source integer')
                    //->placeholder('Nume')
                    ->controlsource('code')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('type_utility_id')
                    ->caption('Tip Utilizare')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('type_utility_id')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('provider_id')
                    ->caption('Denumire Furnizor')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('provider_id')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )
             ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('client_code')
                ->caption('Cod Client')
                ->class('form-control  data-source')
                //->placeholder('Nume')
                ->controlsource('client_code')
                ->controltype('textbox')
                ->maxlength(255)

                
        )
        ;

    }
}