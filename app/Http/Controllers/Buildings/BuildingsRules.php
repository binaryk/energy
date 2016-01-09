<?php namespace App\Http\Controllers\Buildings;
use System\FormsRecord;

class BuildingsRules extends FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare institutie')
            ->setCaption('update', 'Modificare institutie (#:id:)')
            ->setCaption('delete', 'Ștergere institutie (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea cladirii a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adăugarea cladirii <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea cladirii a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea cladirii <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Stergerea cladirii a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ștergerea cladirii <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'name', 'required')
            ->addRule('update', 'name', 'required')
            ->addRule('insert', 'address', 'required')
            ->addRule('update', 'address', 'required')
            ->addRule('insert', 'locality', 'required')
            ->addRule('update', 'locality', 'required')
            ->addRule('insert', 'energy_responsable', 'required')
            ->addRule('update', 'energy_responsable', 'required')
            ->addRule('insert', 'year', 'required')
            ->addRule('update', 'year', 'required')

            ->addMessage('insert', 'name.required', 'Denumirea cladirii trebuie completata.')
            ->addMessage('update', 'name.required', 'Denumirea cladirii trebuie completata.')
            ->addMessage('insert', 'address.required', 'Adresa cladirii trebuie completata.')
            ->addMessage('update', 'address.required', 'Adresa cladirii trebuie completata.')
            ->addMessage('insert', 'locality.required', 'Introduceti localitatea.')
            ->addMessage('update', 'locality.required', 'Introduceti localitatea.')
            ->addMessage('insert', 'energy_responsable.required', 'Introduceti anul contstructiei.')
            ->addMessage('update', 'energy_responsable.required', 'Introduceti anul contstructiei.')
            ->addMessage('insert', 'year.required', 'Responsabilul energetic trebuie declarat.')
            ->addMessage('update', 'year.required', 'Responsabilul energetic trebuie declarat.')
        ;
    }

    public static function create($id = NULL)
    {
        return self::$instance = new BuildingsRules($id);
    }

}