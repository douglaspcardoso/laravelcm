<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    protected $fillable = [
        'page_id',
        'title',
        'description',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

}
