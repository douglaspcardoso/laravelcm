<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'page_id',
        'email',
        'address',
        'phone1',
        'phone2',
        'cnpj'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function networks()
    {
        return $this->hasMany(SocialNetwork::class);
    }

}
