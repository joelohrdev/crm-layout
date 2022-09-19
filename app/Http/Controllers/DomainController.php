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
            'domain' => $domain,
        ]);
    }

    public function import()
    {
        $responseServer = Http::withHeaders([
            'Authorization' => 'whm root:'.$this->API_KEY_10,
        ])->get('https://server10.turnkeydigital.dev:2087/cpsess/json-api/listaccts?api.version=1&api.sort.enable=1&api.sort.a.field=domain&api.columns.b=domain&api.columns.c=ip&api.columns.d=diskused&api.columns.e=startdate&api.columns.f=suspended&api.columns.enable=1');

        $domains = $responseServer->json()['data']['acct'];

        DB::table('domains')->truncate();

        foreach ($domains as $d) {

            $url = $d['domain'];
            $api = Http::get('https://api.ip2whois.com/v2?key=BZGZFHM8LR8L1LZDPRFZMAFDKAWGXA1E&domain=' . $url);
            $data = json_decode($api);
            $registrar = $data;

            if($data) {
                dump($registrar);
            }

            $domain = new Domain;
            $domain->name = $d['domain'];
            $domain->url = 'https://'.$d['domain'];
//            if($data) {
//                $domain->registrar = $data->registrar->name;
//            }
            $domain->server_id = 1;
            $domain->save();
        }

//        $urls = Domain::pluck('name');
//
//        $tkd = Http::get("https://api.ip2whois.com/v2?key=BZGZFHM8LR8L1LZDPRFZMAFDKAWGXA1E&domain=turnkeydigital.com");
//        $data = json_decode($tkd);
//        dump($data->registrar->name);

//        return redirect('/dashboard');
    }
}
