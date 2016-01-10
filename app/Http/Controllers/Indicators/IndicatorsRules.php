<?php namespace App\Http\Controllers\Indicators;
use System\FormsRecord;

            
class IndicatorsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Indicator')
            ->setCaption('update', 'Modificare Indicator (#:id:)')
            ->setCaption('delete', 'Ștergere Indicator (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea indicatorului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea indicatorului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea indicatorului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea indicatorului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea indicatorului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea indicatorului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'name', 'required')
            ->addRule('update', 'name', 'required')
            ->addRule('insert', 'nr_indicator', 'required')
            ->addRule('update', 'nr_indicator', 'required')
            
            ->addMessage('insert', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'nr_indicator.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'nr_indicator.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
            
        return self::$instance = new IndicatorsRules($id);
    }
}