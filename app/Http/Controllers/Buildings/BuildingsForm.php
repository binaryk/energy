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
                    ->caption('Nume institutie')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('name')
                    ->controltype('textbox')
                    ->maxlength(255)
            )

            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('street')
                    ->caption('Nume stradă')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('street')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )

             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr')
                    ->caption('Număr')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr')
                    ->controltype('textbox')
                    ->maxlength(255)

                    
            )
        ;

    }
}