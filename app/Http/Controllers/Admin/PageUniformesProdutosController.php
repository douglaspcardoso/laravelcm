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

    public function load()
    {
        $gallery = $this->service->getByPageId($this->page->id);

        $imagesSorted = $gallery->images->sortBy('index');

        return response()->json([
            'images' => $imagesSorted->values()->all(),
        ]);
    }

    public function upload(Request $request)
    {
        $gallery = $this->service->getByPageId($this->page->id);

        $this->service->upload($request->all(), $gallery);

        return response()->json();
    }

    public function delete($id)
    {
        $gallery = $this->service->getByPageId($this->page->id);

        $image = $gallery->images->where('id', $id)->first();

        $this->service->destroy($image);

        return response()->json();
    }

    public function reorder(Request $request)
    {
        $this->service->reorder($request->data);

        return response()->json();
    }

    public function update(Request $request)
    {
        $gallery = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $gallery);

        return back()->with('success','Uniformes>sobre atualizado com sucesso.');
    }

}