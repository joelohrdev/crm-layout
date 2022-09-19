<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function edit(Contact $contact)
    {
        return view('contact.edit', [
            'contact' => $contact,
        ]);
    }
}
