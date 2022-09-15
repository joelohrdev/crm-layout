<?php

namespace App\Http\Livewire\Server;

use Http;
use Livewire\Component;

class ServerFour extends Component
{
    private $API_KEY_04;

    public function mount()
    {
        $this->API_KEY_04 = env('SERVER_04_KEY');
    }

    public function render()
    {
        $responseServer = Http::withHeaders([
            'Authorization' => 'whm root:' . $this->API_KEY_04
        ])->get('https://server.turnkeydigital4.com:2087/cpsess/json-api/listaccts?api.version=1&api.sort.enable=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1');

        return view('livewire.server.server-nine', [
            'accounts' => $responseServer->json()
        ]);
    }
}
