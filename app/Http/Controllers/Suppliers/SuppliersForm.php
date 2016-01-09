<?php namespace App\Http\Controllers\Suppliers;
use Processing\Form\Form;

class SuppliersForm extends \Processing\Form\Form
{

    /**
     * @return PersoaneFiziceForm, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new SuppliersForm();
    }

    protected function setView()
    {
        $this->view('suppliers_list.form');
    }

    protected function setModel()
    {
        $this->model('App|Models|Supplier');
    }

    protected function addControls()
    {
       $this
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('name')
                    ->caption('Denumire Furnizor')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('name')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('type')
                    ->caption('Tip Furnizor De Utilitati')
                    ->class('form-control  data-source input-group form-select init-on-update-delete')
                    //->placeholder('Nume')
                    ->controlsource('type')
                    ->controltype('combobox')
                    ->options(\App\Models\Supplier::type_supplier())
                    // ->maxlength(255)
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('unit_measurement')
                    ->caption('Unitatea De Masura A Energiei')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('unit_measurement')
                    ->controltype('textbox')
                    ->maxlength(255)
            )
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('address')
                    ->caption('Adresa')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('address')
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
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('county')
                    ->caption('Judetul')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('county')
                    ->controltype('textbox')
                    ->maxlength(255)       
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('email')
                    ->caption('E-Mail')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('email')
                    ->controltype('textbox')
                    ->maxlength(255)
                    
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('phone')
                    ->caption('Telefon')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('phone')
                    ->controltype('textbox')
                    ->maxlength(255)
                    
            )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('fax')
                    ->caption('Fax')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('fax')
                    ->controltype('textbox')
                    ->maxlength(255)   
            )
             ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('contact_person')
                    ->caption('Persoana De Contact')
                    ->class('form-control  data-source')
                    //->placeholder('Nume')
                    ->controlsource('contact_person')
                    ->controltype('textbox')
                    ->maxlength(255)   
            )

        ;      

    }
}