<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientsIndex extends Component
{
    public function render()
    {
        return view('livewire.clients-index', [
            'clients' => Client::orderBy('name', 'ASC')->get()
        ]);
    }
}
