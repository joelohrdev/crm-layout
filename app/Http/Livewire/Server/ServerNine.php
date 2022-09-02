<?php

namespace App\Http\Livewire\Server;

use Http;
use Livewire\Component;

class ServerNine extends Component
{
    private $API_KEY_09;

    public function mount()
    {
        $this->API_KEY_09 = env('SERVER_09_API_KEY');
    }

    public function render()
    {
        $responseServer = Http::withHeaders([
            'Authorization' => 'whm root:' . $this->API_KEY_09
        ])->get('https://server9.turnkeydigital.dev:2087/cpsess/json-api/listaccts?api.version=1&api.sort.enable=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1');

        return view('livewire.server.server-nine', [
            'accounts' => $responseServer->json()
        ]);
    }
}
