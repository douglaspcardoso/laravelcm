<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Page;
use App\Services\AboutService;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageUniformesSobreController extends Controller
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
        $this->page = $pageService->getByName('uniformes-sobre');
    }

    public function index()
    {
        $about = $this->service->getByPageId($this->page->id);

        return view('admin.pages.uniformes.sobre', compact('about'));
    }

    public function update(Request $request)
    {
        $about = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $about);

        return back()->with('success','Uniformes>sobre atualizado com sucesso.');
    }

}