<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'address',
        'city',
        'state',
        'postal_code',
        'phone_number',
        'email_address',
    ];
}
