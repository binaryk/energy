<?php namespace App\Http\Controllers\Publiclighting;
use System\FormsRecord;

class PubliclightingRules extends FormsRecord
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

            ->addRule('insert', 'provider_id', 'required|not_in:0')
            ->addRule('update', 'provider_id', 'required|not_in:0')
            ->addRule('insert', 'measuring_point', 'required|not_in:0')
            ->addRule('update', 'measuring_point', 'required|not_in:0')
            ->addRule('insert', 'nr_bill', 'required')
            ->addRule('update', 'nr_bill', 'required')
            ->addRule('insert', 'date_of_issue', 'required')
            ->addRule('update', 'date_of_issue', 'required')
            ->addRule('insert', 'ective_energy', 'required')
            ->addRule('update', 'ective_energy', 'required')
            ->addRule('insert', 'inductive_reactive_energy', 'required')
            ->addRule('update', 'inductive_reactive_energy', 'required')
            ->addRule('insert', 'capacitive_reactive_energy', 'required')
            ->addRule('update', 'capacitive_reactive_energy', 'required')
            ->addRule('insert', 'total_payment', 'required')
            ->addRule('update', 'total_payment', 'required')

            ->addMessage('insert', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'provider_id.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'provider_id.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'provider_id.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'provider_id.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'measuring_point.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'measuring_point.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'measuring_point.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'measuring_point.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'nr_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'nr_bill.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'date_of_issue.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'date_of_issue.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'ective_energy.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'ective_energy.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'inductive_reactive_energy.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'inductive_reactive_energy.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'capacitive_reactive_energy.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'capacitive_reactive_energy.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'total_payment.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'total_payment.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new PubliclightingRules($id);
    }
}