<?php

namespace App\Services;

use App\Models\Page;

class PageService {

    public function __construct()
    {
    }

    public function getByName($name)
    {
        $page = Page::where('name', $name)->first();

        if (!$page) {
            $page = new Page();
            $page->name = $name;
            $page->save();
        }

        return $page;
    }
}