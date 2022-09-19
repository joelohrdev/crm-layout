<?php

namespace App\Http\Livewire;

use Http;
use App\Models\Client;
use App\Models\Domain;
use App\Models\Server;
use Livewire\Component;

class ClientShow extends Component
{
    public $client;

    public $servers;

    public $domains;

    public $contacts;

    public $wooMonth;
    public $wooYear;

    private $username;
    private $password;

    public function mount(Client $client)
    {
        if($this->username) {
            $this->username = $client->consumer_key;
            $this->password = $client->consumer_secret;
        }

        $this->servers = Server::where('client_id', $client->id)->orderBy('name', 'ASC')->get();
        $this->domains = Domain::where('client_id', $client->id)->orderBy('name', 'ASC')->get();
        $this->client = $client;
    }

    public function render()
    {
        if($this->username) {
            $woomonth = Http::withBasicAuth($this->username, $this->password)->get('https://www.precision-vision.com/wp-json/wc/v3/reports/sales?period=month');
            $wooyear = Http::withBasicAuth($this->username, $this->password)->get('https://www.precision-vision.com/wp-json/wc/v3/reports/sales?period=year');
            $this->wooMonth = $woomonth->json();
            $this->wooYear = $wooyear->json();
        }

        return view('livewire.client-show');
    }
}
