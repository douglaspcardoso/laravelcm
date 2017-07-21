<?php

namespace App\Services;

use App\Models\Service;
use App\Models\ServiceItem;

class ServiceItemService {

    public function __construct()
    {
    }

    public function getById($itemId)
    {
        $item = ServiceItem::find($itemId);

        return $item;
    }

    public function add(array $data, Service $service)
    {
        $service->items()->create($data);
    }

    public function update(array $data, ServiceItem $item)
    {
        $item->title = $data['title'];
        $item->subtitle = $data['subtitle'];
        $item->description = $data['description'];

        $item->save();
    }

    public function destroy(ServiceItem $item)
    {
        $item->delete();
    }
}