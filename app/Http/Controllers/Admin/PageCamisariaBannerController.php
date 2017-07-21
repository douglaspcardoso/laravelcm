<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\BannerService;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageCamisariaBannerController extends Controller
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var BannerService
     */
    private $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;

        $pageService = new PageService();
        $this->page = $pageService->getByName('camisaria-banner');
    }

    public function index()
    {
        $banner = $this->service->getByPageId($this->page->id);

        return view('admin.pages.camisaria.banner', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $banner = $this->service->getByPageId($this->page->id);

        $this->service->save($request->file('imgInp'), $banner);

        return back()->with('success','Image Upload successful');
    }
}
