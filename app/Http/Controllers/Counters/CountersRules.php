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

            ->addRule('insert', 'code', 'required')
            ->addRule('update', 'code', 'required')
            ->addRule('insert', 'type_utility_id', 'required|not_in:0')
            ->addRule('update', 'type_utility_id', 'required|not_in:0')
            ->addRule('insert', 'provider_id', 'required|not_in:0')
            ->addRule('update', 'provider_id', 'required|not_in:0')
            ->addRule('update', 'client_code', 'required')
            ->addRule('update', 'client_code', 'required')

            ->addMessage('insert', 'code.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'code.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'type_utility_id.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'type_utility_id.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'type_utility_id.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'type_utility_id.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'provider_id.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'provider_id.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'provider_id.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'provider_id.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'client_code.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'client_code.required', 'Acest cimp trebuie completat.')
        ;
    }

    public static function create($id)
    {
        return self::$instance = new CountersRules($id);
    }

}