<?php

namespace App\Services;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GalleryService {

    public function __construct()
    {
    }

    public function getByPageId($pageId)
    {
        $gallery = Gallery::where('page_id', $pageId)->with('images')->first();

        if (!$gallery) {
            $gallery = new Gallery();
            $gallery->page_id = $pageId;
        }

        return $gallery;
    }

    public function getById($galleryId)
    {
        $gallery = Gallery::find($galleryId);

        return $gallery;
    }

    public function upload(array $data, Gallery $gallery)
    {
        if (array_key_exists('gallery_images', $data) && count($data['gallery_images']) > 0) {
            $images = [];

            foreach ($data['gallery_images'] as $image) {
                $galleryImage = new GalleryImage();
                $galleryImage->thumb = "placeholder";
                $galleryImage->image = "placeholder";
                $galleryImage->alt = "";
                $galleryImage->title = "";
                $galleryImage->description = "";
                $galleryImage->index = 999999;

                $saved = $gallery->images()->save($galleryImage);

                $imageExt = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->timestamp . '-' . $saved->id . '.' . $imageExt;
                $imageDest = '/front/images/produtos';

                $destinationPath = public_path($imageDest . '/thumbnails');
                $img = Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imageName);
                $img->destroy();

                $destinationPath = public_path($imageDest);
                $image->move($destinationPath, $imageName);

                $saved->thumb = $imageDest . "/thumbnails/" . $imageName;
                $saved->image = $imageDest . "/" . $imageName;

                $images[] = $saved;
                unset($saved);
            }

            $gallery->images()->saveMany($images);
        }
    }

    public function reorder(array $stack)
    {
        $i = 0;
        foreach ($stack as $data) {
            $image = GalleryImage::find($data['key']);
            $image->index = $i;
            $image->save();

            $i++;
        }
    }

    public function save(array $data, Gallery $gallery)
    {
        $gallery->title = $data['title'];
        $gallery->description = $data['description'];

        $gallery->save();

        if (array_key_exists('gallery_images', $data) && count($data['gallery_images']) > 0) {
            $images = [];

            foreach ($data['gallery_images'] as $image) {
                $galleryImage = new GalleryImage();
                $galleryImage->thumb = "placeholder";
                $galleryImage->image = "placeholder";
                $galleryImage->alt = "";
                $galleryImage->title = "";
                $galleryImage->description = "";

                $saved = $gallery->images()->save($galleryImage);

                $imageExt = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->timestamp . '-' . $saved->id . '.' . $imageExt;
                $imageDest = '/front/images/produtos';

                $destinationPath = public_path($imageDest . '/thumbnails');
                $img = Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imageName);
                $img->destroy();

                $destinationPath = public_path($imageDest);
                $image->move($destinationPath, $imageName);

                $saved->thumb = $imageDest . "/thumbnails/" . $imageName;
                $saved->image = $imageDest . "/" . $imageName;

                $images[] = $saved;
                unset($saved);
            }

            $gallery->images()->saveMany($images);
        }
    }

    public function destroy(GalleryImage $galleryImage)
    {
        if (File::exists(public_path($galleryImage->image))) {
            File::delete(public_path($galleryImage->image));
        }
        if (File::exists(public_path($galleryImage->thumb))) {
            File::delete(public_path($galleryImage->thumb));
        }

        $galleryImage->delete();
    }

}