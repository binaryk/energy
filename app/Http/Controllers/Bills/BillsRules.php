<?php namespace App\Http\Controllers\Bills;
use System\FormsRecord;

class BillsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Factura')
            ->setCaption('update', 'Modificare Factura (#:id:)')
            ->setCaption('delete', 'Ștergere Factura (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea facturii a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea facturii <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea facturii a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea facturii <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea facturii a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea facturii <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nr_bill', 'required')
            ->addRule('update', 'nr_bill', 'required')
            ->addRule('insert', 'type_bill', 'required')
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
            ->addRule('update', 'super_power', 'required')

            ->addMessage('insert', 'nr_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'nr_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'type_bill.required', 'Acest cimp trebuie completat.')
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
            ->addMessage('update', 'super_power.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new BillsRules($id);
    }
}