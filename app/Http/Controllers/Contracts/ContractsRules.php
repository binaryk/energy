<?php namespace App\Http\Controllers\Contracts;
use System\FormsRecord;

            
class ContractsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Contract')
            ->setCaption('update', 'Modificare Contract (#:id:)')
            ->setCaption('delete', 'Ștergere Contract (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea contractului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea contractului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea contractului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea contractului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea contractului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea contractului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nr_contract', 'required')
            ->addRule('update', 'nr_contract', 'required')
            ->addRule('insert', 'signature_date', 'required')
            ->addRule('update', 'signature_date', 'required')
            
            ->addMessage('insert', 'nr_contract.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'nr_contract.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'signature_date.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'signature_date.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
            
        return self::$instance = new ContractsRules($id);
    }
}