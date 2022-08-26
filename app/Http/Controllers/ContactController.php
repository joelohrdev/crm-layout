<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit(Contact $contact)
    {
        return view('contact.edit', [
            'contact' => $contact
        ]);
    }
}
