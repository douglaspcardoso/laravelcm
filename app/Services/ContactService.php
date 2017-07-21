<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Request;

class ContactService {

    public function __construct()
    {
    }

    public function getByPageId($pageId)
    {
        $contact = Contact::where('page_id', $pageId)->first();

        if (!$contact) {
            $contact = new Contact();
            $contact->page_id = $pageId;
        }

        return $contact;
    }

    public function getById($contactId)
    {
        $contact = Contact::find($contactId);

        return $contact;
    }

    public function save(array $data, Contact $contact)
    {
        $contact->email = $data['email'];
        $contact->address = $data['address'];
        $contact->phone1 = $data['phone1'];
        $contact->phone2 = $data['phone2'];
        $contact->cnpj = $data['cnpj'];
        
        $contact->save();
    }

}