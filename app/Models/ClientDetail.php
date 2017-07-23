<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{

    protected $fillable = [
        'client_id',
        'thumb',
        'image',
        'alt',
        'index',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
