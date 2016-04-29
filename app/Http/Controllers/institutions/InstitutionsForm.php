<?php namespace App\Http\Controllers\Institutions;
use Processing\Form\Form;

class InstitutionsForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new InstitutionsForm();
    }

    protected function setView()
    {
        $this->view('institutions.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Institution');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('name')
                    ->caption('Denumirea Institutiei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('name')
                    ->controltype('textbox')
                    ->maxlength(255)
            ) 
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('locality')
                    ->caption('Localitatea')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('locality')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
        ;      

    }
}