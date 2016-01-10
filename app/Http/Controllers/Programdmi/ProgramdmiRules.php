<?php namespace App\Http\Controllers\Programdmi;
use System\FormsRecord;

class ProgramdmiRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Bloc')
            ->setCaption('update', 'Modificare Bloc (#:id:)')
            ->setCaption('delete', 'Ștergere Bloc (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea blocului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea blocului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea blocului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea blocului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea blocului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea blocului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'address', 'required')
            ->addRule('update', 'address', 'required')
            ->addRule('insert', 'locality', 'required')
            ->addRule('update', 'locality', 'required')
            ->addRule('insert', 'county', 'required')
            ->addRule('update', 'county', 'required')
            ->addRule('insert', 'owner', 'required')
            ->addRule('update', 'owner', 'required')

            ->addMessage('insert', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'county.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'county.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'owner.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'owner.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new ProgramdmiRules($id);
    }

}