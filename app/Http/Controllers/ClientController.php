<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function show(Client $client)
    {
        return view('client.show', [
            'client' => $client,
        ]);
    }

    public function edit(Client $client)
    {
        return view('client.edit', [
            'client' => $client,
        ]);
    }
}
