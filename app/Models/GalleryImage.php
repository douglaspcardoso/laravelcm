<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{

    protected $fillable = [
        'gallery_id',
        'thumb',
        'image',
        'alt',
        'title',
        'description',
        'index',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
