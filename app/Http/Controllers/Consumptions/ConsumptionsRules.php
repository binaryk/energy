<?php namespace App\Http\Controllers\Consumptions;
use System\FormsRecord;

class ConsumptionsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Consum')
            ->setCaption('update', 'Modificare Consum (#:id:)')
            ->setCaption('delete', 'Ștergere Consum (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea consumului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea consumului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea consumului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea consumului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea consumului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea consumului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'year_faz', 'required')
            ->addRule('update', 'year_faz', 'required')
            ->addRule('insert', 'month_faz', 'required')
            ->addRule('update', 'month_faz', 'required')
            ->addRule('insert', 'month_distance', 'required')
            ->addRule('update', 'month_distance', 'required')
            ->addRule('insert', 'monthly_consumption', 'required')
            ->addRule('update', 'monthly_consumption', 'required')

            ->addMessage('insert', 'year_faz.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'year_faz.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'month_faz.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'month_faz.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'month_distance.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'month_distance.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'monthly_consumption.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'monthly_consumption.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new ConsumptionsRules($id);
    }
}