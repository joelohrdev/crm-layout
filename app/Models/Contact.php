<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'client_id',
        'position',
        'phone_number',
        'extension',
        'email_address',
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

}
