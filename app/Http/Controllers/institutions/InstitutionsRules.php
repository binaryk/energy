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

            ->setFeedback('insert', 'success', 'Adăugarea intitutiei a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea intitutiei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea intitutiei a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea intitutiei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea intitutiei a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea intitutiei <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'name', 'required')
            ->addRule('update', 'name', 'required')

            ->addMessage('insert', 'name.required', 'Denumirea intitutiei trebuie completată.')
            ->addMessage('update', 'name.required', 'Denumirea intitutiei trebuie completată.')
        ;
    }

    public static function create()
    {
        return self::$instance = new InstitutionsRules('institutions');
    }

}