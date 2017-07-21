<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = ['name', 'description'];

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function About()
    {
        return $this->hasMany(About::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

}
