<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Http;
use Illuminate\Http\Client\Pool;
use Livewire\WithPagination;

class WhmTest extends Component
{
    use WithPagination;

    private $API_KEY_10;
    private $API_KEY_09;

    public function mount()
    {
        $this->API_KEY_10 = env('SERVER_10_API_KEY');
        $this->API_KEY_09 = env('SERVER_09_API_KEY');
    }

    public function render()
    {

//        Clear the tables
//        Send a GET request to API
//        Import domains into database

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->as('server10')->withHeaders([
                'Authorization' => 'whm root:' . $this->API_KEY_10
            ])->get('https://server10.turnkeydigital.dev:2087/cpsess/json-api/listaccts?api.version=1&api.sort.enable=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1'),
            $pool->as('server09')->withHeaders([
                'Authorization' => 'whm root:' . $this->API_KEY_09
            ])->get('https://server9.turnkeydigital.dev:2087/cpsess/json-api/listaccts?api.version=1&api.sort.enable=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1'),
        ]);

//        dump($responseServer->json());

        return view('livewire.whm-test', [
            'server10' => $responses['server10']->json(),
            'server09' => $responses['server09']->json(),
        ]);
    }
}
