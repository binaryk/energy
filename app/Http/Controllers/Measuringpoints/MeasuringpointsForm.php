<?php namespace App\Http\Controllers\Measuringpoints;
use Processing\Form\Form;

class MeasuringpointsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new MeasuringpointsForm();
    }

    protected function setView()
    {
        $this->view('measuring_points.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Point');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('address')
                    ->caption('Adresa Punct De Masurare')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('address')
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
                    ->name('nlc')
                    ->caption('NLC')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nlc')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
        ;      

    }
}