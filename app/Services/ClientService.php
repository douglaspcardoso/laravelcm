<?php

namespace App\Services;

use App\Models\Client;
use App\Models\ClientDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ClientService {

    public function __construct()
    {
    }

    public function getByPageId($pageId)
    {
        $client = Client::where('page_id', $pageId)->with('details')->first();

        if (!$client) {
            $client = new Client();
            $client->page_id = $pageId;
        }

        return $client;
    }

    public function getById($clientId)
    {
        $client = Client::find($clientId);

        return $client;
    }

    public function save(array $data, Client $client)
    {
        $client->title = $data['title'];
        $client->description = $data['description'];

        $client->save();

        if (array_key_exists('gallery_images', $data) && count($data['gallery_images']) > 0) {
            $details = [];

            foreach ($data['gallery_images'] as $image) {
                $clientDetail = new ClientDetail();
                $clientDetail->thumb = "placeholder";
                $clientDetail->image = "placeholder";
                $clientDetail->alt = "";
                $clientDetail->index = 999999;

                $saved = $client->details()->save($clientDetail);

                $imageExt = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->timestamp . '-' . $saved->id . '.' . $imageExt;
                $imageDest = '/front/images/uniformes/clientes';

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

                $details[] = $saved;
                unset($saved);
            }

            $client->details()->saveMany($details);
        }
    }

    public function destroy(ClientDetail $clientDetail)
    {
        if (File::exists(public_path($clientDetail->image))) {
            File::delete(public_path($clientDetail->image));
        }
        if (File::exists(public_path($clientDetail->thumb))) {
            File::delete(public_path($clientDetail->thumb));
        }

        $clientDetail->delete();
    }

    public function upload(array $data, Client $client)
    {
        if (array_key_exists('gallery_images', $data) && count($data['gallery_images']) > 0) {
            $details = [];

            foreach ($data['gallery_images'] as $image) {
                $clientDetail = new ClientDetail();
                $clientDetail->thumb = "placeholder";
                $clientDetail->image = "placeholder";
                $clientDetail->alt = "";
                $clientDetail->index = 999999;

                $saved = $client->details()->save($clientDetail);

                $imageExt = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->timestamp . '-' . $saved->id . '.' . $imageExt;
                $imageDest = '/front/images/uniformes/clientes';

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

                $details[] = $saved;
                unset($saved);
            }

            $client->details()->saveMany($details);
        }
    }

    public function reorder(array $stack)
    {
        $i = 0;
        foreach ($stack as $data) {
            $clientDetail = ClientDetail::find($data['key']);
            $clientDetail->index = $i;
            $clientDetail->save();

            $i++;
        }
    }

}