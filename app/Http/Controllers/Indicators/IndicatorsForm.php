<?php namespace App\Http\Controllers\Indicators;
use Processing\Form\Form;

class IndicatorsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new IndicatorsForm();
    }

    protected function setView()
    {
        $this->view('statistical_indicators.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Indicator');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('name')
                    ->caption('Indicatori Statistici')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('name')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_indicator')
                    ->caption('Localitate')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('nr_indicator')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
             
        ;      

    }
}