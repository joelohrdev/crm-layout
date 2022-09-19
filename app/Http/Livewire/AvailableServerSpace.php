<?php

namespace App\Http\Livewire;

use App\Models\Server;
use Livewire\Component;

class AvailableServerSpace extends Component
{
    public function render()
    {
        return view('livewire.available-server-space', [
            'servers' => Server::withCount('domains')->orderBy('name', 'ASC')->get(),
        ]);
    }
}
