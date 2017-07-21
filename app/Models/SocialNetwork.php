<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{

    protected $fillable = [
        'contact_id',
        'social',
        'url',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
