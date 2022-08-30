<?php

namespace App\Http\Livewire;

use App\Models\Server;
use Livewire\Component;
use Livewire\WithPagination;

class ServersIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.servers-index', [
            'servers' => Server::with('client')
                ->with('domains')
                ->orderBy('name', 'ASC')
                ->paginate(10)
        ]);
    }
}
