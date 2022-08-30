<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.clients-index', [
            'clients' => Client::orderBy('status', 'ASC')->orderBy('name', 'ASC')->paginate(10),
        ]);
    }

}
