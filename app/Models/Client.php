<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'page_id',
        'title',
        'description'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function details()
    {
        return $this->hasMany(ClientDetail::class);
    }


}
