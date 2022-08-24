<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'domain', 'server_id', 'client_id', 'registrar', 'managed', 'expires', 'notes'
    ];

    public $casts = [
        'expires' => 'date'
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
