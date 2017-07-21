<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Services\PageService;
use App\Services\ServiceService;
use App\Services\ServiceItemService;
use Illuminate\Http\Request;

class PageUniformesServicosController extends Controller
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var ServiceService
     */
    private $service;

    /**
     * @var ServiceItemService
     */
    private $itemService;

    public function __construct(ServiceService $service, ServiceItemService $itemService)
    {
        $this->service = $service;
        $this->itemService = $itemService;

        $pageService = new PageService();
        $this->page = $pageService->getByName('uniformes-servicos');
    }

    public function index()
    {
        $service = $this->service->getByPageId($this->page->id);

        return view('admin.pages.uniformes.servicos', compact('service'));
    }

    public function store(Request $request)
    {
        $service = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $service);

        return back()->with('success','Uniformes>sobre atualizado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $service = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $service);

        return back()->with('success','Uniformes>sobre atualizado com sucesso.');
    }

    public function createItem($serviceId)
    {
        return view('admin.pages.uniformes.servicos-form', compact('serviceId'));
    }

    public function storeItem(Request $request, $serviceId)
    {
        $service = $this->service->getById($serviceId);

        $this->itemService->add($request->all(), $service);

        return redirect()->route('content.uniformes.servicos.index');
    }

    public function editItem($serviceId, $id)
    {
        $item = $this->itemService->getById($id);

        return view('admin.pages.uniformes.servicos-items-form', compact('item'));
    }

    public function updateItem(Request $request, $serviceId, $id)
    {
        $item = $this->itemService->getById($id);

        $this->itemService->update($request->all(), $item);

        return redirect()->route('content.uniformes.servicos.index');
    }

    public function destroyItem($serviceId, $id)
    {
        $item = $this->itemService->getById($id);

        $this->itemService->destroy($item);

        return back();
    }

}