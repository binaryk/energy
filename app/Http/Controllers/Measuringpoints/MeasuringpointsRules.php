<?php namespace App\Http\Controllers\Measuringpoints;
use System\FormsRecord;

            
class MeasuringpointsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Furnizor')
            ->setCaption('update', 'Modificare Furnizor (#:id:)')
            ->setCaption('delete', 'Ștergere Furnizor (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea furnizorului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea furnizorului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea furnizorului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea furnizorului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea furnizorului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea furnizorului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'address', 'required')
            ->addRule('update', 'address', 'required')
            ->addRule('insert', 'locality', 'required')
            ->addRule('update', 'locality', 'required')
            ->addRule('insert', 'county', 'required')
            ->addRule('update', 'county', 'required')
            ->addRule('insert', 'nlc', 'required')
            ->addRule('update', 'nlc', 'required')

            
            ->addMessage('insert', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'county.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'county.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'nlc.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'nlc.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
            
        return self::$instance = new MeasuringpointsRules($id);
    }
}