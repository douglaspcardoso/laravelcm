<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\GalleryService;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageUniformesProdutosController extends Controller
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var GalleryService
     */
    private $service;

    public function __construct(GalleryService $service)
    {
        $this->service = $service;

        $pageService = new PageService();
        $this->page = $pageService->getByName('uniformes-produtos');
    }

    public function index()
    {
        $gallery = $this->service->getByPageId($this->page->id);

        return view('admin.pages.uniformes.produtos', compact('gallery'));
    }

    public function update(Request $request)
    {
        $gallery = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $gallery);

        return back()->with('success','Uniformes>sobre atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $gallery = $this->service->getByPageId($this->page->id);

        $image = $gallery->images->where('id', $id)->first();

        $this->service->destroy($image);

        return back();
    }

}