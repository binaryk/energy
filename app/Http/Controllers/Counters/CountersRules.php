<?php namespace App\Http\Controllers\Counters;
use System\FormsRecord;

class CountersRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare contor')
            ->setCaption('update', 'Modificare contor (#:id:)')
            ->setCaption('delete', 'Ștergere contor (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea contorului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea contorului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea contorului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea contorului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea contorului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea contorului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'name', 'required')
            ->addRule('update', 'name', 'required')

            ->addMessage('insert', 'name.required', 'Denumirea contorului trebuie completată.')
            ->addMessage('update', 'name.required', 'Denumirea contorului trebuie completată.')
        ;
    }

    public static function create()
    {
        return self::$instance = new CountersRules('counters');
    }

}