<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\SocialNetwork;

class SocialNetworkService {

    public function __construct()
    {
    }

    public function getById($networkId)
    {
        $network = SocialNetwork::find($networkId);

        return $network;
    }

    public function add(array $data, Contact $contact)
    {
        $contact->networks()->create($data);
    }

    public function update(array $data, SocialNetwork $network)
    {
        $network->social = $data['social'];
        $network->url = $data['url'];

        $network->save();
    }

    public function destroy(SocialNetwork $network)
    {
        $network->delete();
    }
}