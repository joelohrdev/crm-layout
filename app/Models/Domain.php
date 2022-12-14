<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url', 'server_id', 'client_id', 'registrar', 'managed', 'expires', 'cloudflare', 'notes',
    ];

    public $casts = [
        'expires' => 'date',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
