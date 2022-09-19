<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'client_id', 'ip_address',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
