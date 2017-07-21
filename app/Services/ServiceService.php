<?php

namespace App\Services;

use App\Models\Service;

class ServiceService {

    public function __construct()
    {
    }

    public function getByPageId($pageId)
    {
        $service= Service::where('page_id', $pageId)->first();

        if (!$service) {
            $service= new Service();
            $service->page_id = $pageId;
        }

        return $service;
    }

    public function getById($contactId)
    {
        $service= Service::find($contactId);

        return $service;
    }

    public function save(array $data, Service $service)
    {
        $service->title = $data['title'];
        $service->description = $data['description'];

        $service->save();
    }

}