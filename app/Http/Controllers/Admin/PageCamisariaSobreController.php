<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\AboutService;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageCamisariaSobreController extends Controller
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var AboutService
     */
    private $service;

    public function __construct(AboutService $service)
    {
        $this->service = $service;

        $pageService = new PageService();
        $this->page = $pageService->getByName('camisaria-sobre');
    }

    public function index()
    {
        $about = $this->service->getByPageId($this->page->id);

        return view('admin.pages.camisaria.sobre', compact('about'));
    }

    public function update(Request $request)
    {
        $about = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $about);

        return back()->with('success','Camisaria>sobre atualizado com sucesso.');
    }

}