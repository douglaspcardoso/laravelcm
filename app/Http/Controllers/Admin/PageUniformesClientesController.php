<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\ClientService;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageUniformesClientesController extends Controller
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var ClientService
     */
    private $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;

        $pageService = new PageService();
        $this->page = $pageService->getByName('uniformes-clientes');
    }

    public function index()
    {
        $client = $this->service->getByPageId($this->page->id);

        return view('admin.pages.uniformes.clientes', compact('client'));
    }

    public function update(Request $request)
    {
        $client = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $client);

        return back()->with('success','Uniformes>clientes atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $client = $this->service->getByPageId($this->page->id);

        $detail = $client->details->where('id', $id)->first();

        $this->service->destroy($detail);

        return back();
    }

    public function load()
    {
        $client = $this->service->getByPageId($this->page->id);

        $clientsSorted = $client->details->sortBy('index');

        return response()->json([
            'details' => $clientsSorted->values()->all(),
        ]);
    }

    public function upload(Request $request)
    {
        $client = $this->service->getByPageId($this->page->id);

        $this->service->upload($request->all(), $client);

        return response()->json();
    }

    public function delete($id)
    {
        $client = $this->service->getByPageId($this->page->id);

        $clientDetail = $client->images->where('id', $id)->first();

        $this->service->destroy($clientDetail);

        return response()->json();
    }

    public function reorder(Request $request)
    {
        $this->service->reorder($request->data);

        return response()->json();
    }

}