<?php namespace App\Http\Controllers\Suppliers;
use System\FormsRecord;

class SuppliersRules extends FormsRecord
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

            ->addRule('insert', 'name', 'required')
            ->addRule('update', 'name', 'required')
            /*->addRule('insert', 'type_bill', 'required')
            ->addRule('update', 'type_bill', 'required')
            ->addRule('insert', 'consumption_billed', 'required')
            ->addRule('update', 'consumption_billed', 'required')
            ->addRule('insert', 'value_witch_tva', 'required')
            ->addRule('update', 'value_witch_tva', 'required')
            ->addRule('insert', 'date_bill', 'required')
            ->addRule('update', 'date_bill', 'required')
            ->addRule('insert', 'start_billing', 'required')
            ->addRule('update', 'start_billing', 'required')
            ->addRule('insert', 'stop_billing', 'required')
            ->addRule('update', 'stop_billing', 'required')
            ->addRule('insert', 'super_power', 'required')
            ->addRule('update', 'super_power', 'required')*/

            ->addMessage('insert', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'name.required', 'Acest cimp trebuie completat.')
            /*->addMessage('insert', 'type_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'type_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'consumption_billed.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'consumption_billed.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'value_witch_tva.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'value_witch_tva.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'date_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'date_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'start_billing.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'start_billing.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'stop_billing.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'stop_billing.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'super_power.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'super_power.required', 'Acest cimp trebuie completat.')*/
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new SuppliersRules($id);
    }
}