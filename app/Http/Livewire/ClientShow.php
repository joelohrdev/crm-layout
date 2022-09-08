<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Server;
use AshAllenDesign\FaviconFetcher\Contracts\Fetcher;
use AshAllenDesign\FaviconFetcher\Favicon;
use Livewire\Component;

class ClientShow extends Component
{
    public $client;
    public $servers;
    public $domains;

    public function mount(Client $client)
    {
        $this->servers = Server::where('client_id', $client->id)->orderBy('name', 'ASC')->get();
        $this->domains = Domain::where('client_id', $client->id)->orderBy('name', 'ASC')->get();
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.client-show');
    }
}
