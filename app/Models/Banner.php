<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected $fillable = [
        'page_id',
        'image_url',
        'image_alt',
        'title',
        'description'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

}
