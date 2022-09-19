<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Carbon\Carbon;
use Livewire\Component;

class ExpiredDomainList extends Component
{
    public function render()
    {
        return view('livewire.expired-domain-list', [
            'domains' => Domain::where('expires', '<=', Carbon::now())->get(),
        ]);
    }
}
