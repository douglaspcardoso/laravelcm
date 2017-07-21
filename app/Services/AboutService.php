<?php

namespace App\Services;

use App\Models\About;
use Illuminate\Support\Facades\Request;

class AboutService {

    public function __construct()
    {
    }

    public function getByPageId($pageId)
    {
        $about = About::where('page_id', $pageId)->first();

        if (!$about) {
            $about = new About();
            $about->page_id = $pageId;
        }

        return $about;
    }

    public function save(array $data, About $about)
    {
        $about->title = $data['title'];
        $about->description = $data['description'];

        $about->save();
    }
}