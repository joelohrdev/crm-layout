<?php

namespace App\Http\Controllers;

use App\Models\Domain;

class DomainController extends Controller
{
    public function edit(Domain $domain)
    {
        return view('domain.edit', [
            'domain' => $domain
        ]);
    }
}
