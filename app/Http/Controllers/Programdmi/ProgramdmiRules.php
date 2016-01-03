<?php namespace App\Http\Controllers\Programdmi;
use System\FormsRecord;

class ProgramdmiRules extends FormsRecord
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

            ->addRule('insert', 'address', 'required')
            ->addRule('update', 'address', 'required')
            ->addRule('insert', 'locality', 'required')
            ->addRule('update', 'locality', 'required')
            ->addRule('insert', 'county', 'required')
            ->addRule('update', 'county', 'required')
            ->addRule('insert', 'owner', 'required')
            ->addRule('update', 'owner', 'required')

            ->addMessage('insert', 'address.required', 'Adresa blocului trebuie completata.')
            ->addMessage('update', 'address.required', 'Adresa blocului trebuie completata.')
            ->addMessage('insert', 'locality.required', 'Localitatea trebuie completata.')
            ->addMessage('update', 'locality.required', 'Localitatea trebuie completata.')
            ->addMessage('insert', 'county.required', 'Judetul trebuie completat.')
            ->addMessage('update', 'county.required', 'Judetul trebuie completat.')
            ->addMessage('insert', 'owner.required', 'Introduceti Proiectanul.')
            ->addMessage('update', 'owner.required', 'Introduceti Proiectanul.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new ProgramdmiRules($id);
    }

}