<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;

class FrontController extends Controller
{
    public function home()
    {
        $contact = $this->getContato();

        return view('front.index', compact('contact'));
    }

    public function contato()
    {
        $contact = $this->getContato();

        return view('front.contato', compact('contact'));
    }

    public function uniformes()
    {
        $about = About::select('abouts.*')
            ->join('pages', 'abouts.page_id', '=', 'pages.id')
            ->where('pages.name', 'uniformes-sobre')
            ->first();

        $gallery = Gallery::select('galleries.*')
            ->join('pages', 'galleries.page_id', '=', 'pages.id')
            ->where('pages.name', 'uniformes-produtos')
            ->with('images')
            ->first();

        $service = Service::select('services.*')
            ->join('pages', 'services.page_id', '=', 'pages.id')
            ->where('pages.name', 'uniformes-servicos')
            ->with('items')
            ->first();

        $client = Client::select('clients.*')
            ->join('pages', 'clients.page_id', '=', 'pages.id')
            ->where('pages.name', 'uniformes-clientes')
            ->with('details')
            ->first();

        $contact = $this->getContato();

        return view('front.uniformes', compact('about', 'gallery', 'service', 'client', 'contact'));
    }

    public function camisaria()
    {
        $about = About::select('abouts.*')
            ->join('pages', 'abouts.page_id', '=', 'pages.id')
            ->where('pages.name', 'camisaria-sobre')
            ->first();

        $gallery = Gallery::select('galleries.*')
            ->join('pages', 'galleries.page_id', '=', 'pages.id')
            ->where('pages.name', 'camisaria-produtos')
            ->with('images')
            ->first();
        $contact = $this->getContato();

        return view('front.camisaria', compact('about', 'gallery', 'contact'));
    }

    private function getContato()
    {
        $contact = Contact::select('contacts.*')
            ->join('pages', 'contacts.page_id', '=', 'pages.id')
            ->where('pages.name', 'contato')
            ->with('networks')
            ->first();

        return $contact;
    }
}
