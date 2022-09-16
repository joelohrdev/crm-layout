<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use DB;
use Http;

class DomainController extends Controller
{
    private $API_KEY_10;

    public function __construct()
    {
        $this->API_KEY_10 = env('SERVER_10_KEY');
    }

    public function edit(Domain $domain)
    {
        return view('domain.edit', [
            'domain' => $domain
        ]);
    }

    public function import()
    {
        $responseServer = Http::withHeaders([
            'Authorization' => 'whm root:' . $this->API_KEY_10
        ])->get('https://server10.turnkeydigital.dev:2087/cpsess/json-api/listaccts?api.version=1&api.sort.enable=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1');

        $domains = $responseServer->json()['data']['acct'];

//        dump($domains);

        DB::table('domains')->truncate();

        foreach ($domains as $d) {
            $domain = new Domain;
            $domain->name = $d['domain'];
            $domain->url = 'https://' . $d['domain'];
            $domain->server_id = 1;
            $domain->expires = null;
            $domain->save();
        }

        return redirect('/dashboard');
    }
}
