<?php namespace App\Http\Controllers\Vehicles;
use System\FormsRecord;

class VehiclesRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Vehicol')
            ->setCaption('update', 'Modificare Vehicol (#:id:)')
            ->setCaption('delete', 'Ștergere Vehicol (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea vehicolului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea vehicolului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea vehicolului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea vehicolului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea vehicolului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea vehicolului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'internal_consumption', 'required')
            ->addRule('update', 'internal_consumption', 'required')
            ->addRule('insert', 'external_consumption', 'required')
            ->addRule('update', 'external_consumption', 'required')
            ->addRule('insert', 'mixed_consumption', 'required')
            ->addRule('update', 'mixed_consumption', 'required')

            ->addMessage('insert', 'internal_consumption.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'internal_consumption.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'external_consumption.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'external_consumption.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'mixed_consumption.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'mixed_consumption.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new VehiclesRules($id);
    }
}