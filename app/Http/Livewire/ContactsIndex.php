<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.contacts-index', [
            'contacts' => Contact::with('clients')
                 ->orderBy('last_name')
                 ->paginate(10),
        ]);
    }
}
