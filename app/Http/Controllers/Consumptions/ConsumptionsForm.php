<?php namespace App\Http\Controllers\Consumptions;
use Processing\Form\Form;

class ConsumptionsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new ConsumptionsForm();
    }

    protected function setView()
    {
        $this->view('consumptions.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Consumer');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('year_faz')
                    ->caption('An Faz')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('year_faz')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('month_faz')
                    ->caption('Luna Faz')
                    ->class('form-control  data-source input-group form-select init-on-update-delete')
                    //->placeholder('Nume')
                    ->controlsource('month_faz')
                    ->controltype('combobox')
                    ->options(\App\Models\Consumer::months())
                    // ->maxlength(255)
            )
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('month_distance')
                    ->caption('Distanta Lunara Parcursa In Km')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('month_distance')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('monthly_consumption')
                    ->caption('Consumul Total Pe Luna In Litri')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('monthly_consumption')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
        ;      

    }
}

  