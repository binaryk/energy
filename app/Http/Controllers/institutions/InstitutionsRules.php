<?php namespace App\Http\Controllers\Institutions;
use System\FormsRecord;

class InstitutionsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare institutie')
            ->setCaption('update', 'Modificare institutie (#:id:)')
            ->setCaption('delete', 'Ștergere institutie (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea institutiei a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea institutiei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea institutiei a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea institutiei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea institutiei a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea institutiei <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'name', 'required')
            ->addRule('update', 'name', 'required')
            ->addRule('insert', 'address', 'required')
            ->addRule('update', 'address', 'required')
            ->addRule('insert', 'locality', 'required')
            ->addRule('update', 'locality', 'required')
            ->addRule('insert', 'energy_responsable', 'required')
            ->addRule('update', 'energy_responsable', 'required')
            ->addRule('insert', 'year', 'required')
            ->addRule('update', 'year', 'required')

            ->addMessage('insert', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'energy_responsable.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'energy_responsable.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'year.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'year.required', 'Acest cimp trebuie completat.')
        ;
    }

    public static function create()
    {
        return self::$instance = new InstitutionsRules('institutions');
    }

}