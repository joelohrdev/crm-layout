<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientsIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.clients-index', [
            'clients' => Client::orderBy('status', 'ASC')
                ->search('name', $this->search)
                ->orderBy('name', 'ASC')
                ->paginate(10),
        ]);
    }
}
