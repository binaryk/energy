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

            ->addRule('insert', 'number', 'required')
            ->addRule('update', 'number', 'required')
            // ->addRule('insert', 'address', 'required')
            // ->addRule('update', 'address', 'required')
            // ->addRule('insert', 'locality', 'required')
            // ->addRule('update', 'locality', 'required')
            // ->addRule('insert', 'energy_responsable', 'required')
            // ->addRule('update', 'energy_responsable', 'required')
            // ->addRule('insert', 'year', 'required')
            // ->addRule('update', 'year', 'required')
            // ->addRule('update', 'height', 'required')
            // ->addRule('update', 'height', 'required')

            ->addMessage('insert', 'number.required', 'Denumirea institutiei trebuie completata.')
            ->addMessage('update', 'number.required', 'Denumirea institutiei trebuie completata.')
            // ->addMessage('insert', 'address.required', 'Adresa institutiei trebuie completata.')
            // ->addMessage('update', 'address.required', 'Adresa institutiei trebuie completata.')
            // ->addMessage('insert', 'locality.required', 'Introduceti localitatea.')
            // ->addMessage('update', 'locality.required', 'Introduceti localitatea.')
            // ->addMessage('insert', 'energy_responsable.required', 'Introduceti anul contstructiei.')
            // ->addMessage('update', 'energy_responsable.required', 'Introduceti anul contstructiei.')
            // ->addMessage('insert', 'year.required', 'Responsabilul energetic trebuie declarat.')
            // ->addMessage('update', 'year.required', 'Responsabilul energetic trebuie declarat.')
            // ->addMessage('insert', 'height.required', 'Regimul de inaltime a institutiei trebuie declarat.')
            // ->addMessage('update', 'height.required', 'Regimul de inaltime a institutiei trebuie declarat.')
        ;
    }

    public static function create($id)
    {
        return self::$instance = new ProgramdmiRules($id);
    }

}