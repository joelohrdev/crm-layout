<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function edit(Server $server)
    {
        return view('server.edit', [
            'server' => $server
        ]);
    }
}
