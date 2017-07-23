<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\Route;

class BannerService {

    public function __construct()
    {
    }

    public function getByPageId($pageId)
    {
        $banner = Banner::where('page_id', $pageId)->first();

        if (!$banner) {
            $banner = new Banner();
            $banner->page_id = $pageId;
        }

        return $banner;
    }

    public function save($image, Banner $banner)
    {
        switch(Route::currentRouteName()) {
            case 'content.home.update':
                $imageName = 'home.png';
                break;
            case 'content.uniformes.banner.update':
                $imageName = 'uniformes.png';
                break;
            case 'content.camisaria.banner.update':
                $imageName = 'camisaria.png';
                break;
        }

        $imageDest = '/front/images/banners/';

        $destinationPath = public_path($imageDest);
        $image->move($destinationPath, $imageName);

        $banner->image_url = $imageDest . $imageName;

        $banner->save();
    }
}