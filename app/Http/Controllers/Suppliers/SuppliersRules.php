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
            ->addRule('insert', 'type', 'required|not_in:0')
            ->addRule('update', 'type', 'required|not_in:0')
            ->addRule('insert', 'unit_measurement', 'required')
            ->addRule('update', 'unit_measurement', 'required')
            ->addRule('insert', 'address', 'required')
            ->addRule('update', 'address', 'required')
            ->addRule('insert', 'locality', 'required')
            ->addRule('update', 'locality', 'required')
            ->addRule('insert', 'county', 'required')
            ->addRule('update', 'county', 'required')
            ->addRule('insert', 'email', 'required')
            ->addRule('update', 'email', 'required')
            ->addRule('insert', 'phone', 'required')
            ->addRule('update', 'phone', 'required')
            ->addRule('insert', 'fax', 'required')
            ->addRule('update', 'fax', 'required')
            ->addRule('insert', 'contact_person', 'required')
            ->addRule('update', 'contact_person', 'required')

            ->addMessage('insert', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'name.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'type.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'type.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'type.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'type.not_in', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'unit_measurement.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'unit_measurement.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'address.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'locality.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'county.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'county.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'email.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'email.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'phone.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'phone.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'fax.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'fax.required', 'Acest cimp trebuie completat.')
            ->addMessage('insert', 'contact_person.required', 'Acest cimp trebuie completat.')
            ->addMessage('update', 'contact_person.required', 'Acest cimp trebuie completat.')
            
        ;
    }

    public static function create($id)
    {
        return self::$instance = new SuppliersRules($id);
    }
}