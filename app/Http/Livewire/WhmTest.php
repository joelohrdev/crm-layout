<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Http;
use Livewire\WithPagination;

class WhmTest extends Component
{
    use WithPagination;

    private $API_KEY;

    public function __construct()
    {
        $this->API_KEY = env('SERVER_10_API_KEY');
    }

    public function render()
    {
        $responseServer = Http::withHeaders([
            'Authorization' => 'whm root:' . $this->API_KEY
        ])->get('https://server10.turnkeydigital.dev:2087/cpsessJ293NWLJ5JVG7RNEBS9C9WSV1EDE08NO/json-api/listaccts?api.version=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1');

//        dump($responseServer->json());

        return view('livewire.whm-test', [
            'accounts' => $responseServer->json()
        ]);
    }
}
