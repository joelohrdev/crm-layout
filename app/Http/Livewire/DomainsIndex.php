<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Livewire\Component;
use Livewire\WithPagination;

class DomainsIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.domains-index', [
            'domains' => Domain::with('server')
                ->search('name', $this->search)
                ->orderBy('name', 'ASC')
                ->paginate(10)
        ]);
    }
}
