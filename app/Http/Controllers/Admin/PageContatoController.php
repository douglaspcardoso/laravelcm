<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Page;
use App\Models\SocialNetwork;
use App\Services\ContactService;
use App\Services\PageService;
use App\Services\SocialNetworkService;
use Illuminate\Http\Request;

class PageContatoController extends Controller
{

    /**
     * @var Page
     */
    private $page;

    /**
     * @var ContactService
     */
    private $service;

    /**
     * @var SocialNetworkService
     */
    private $networkService;

    public function __construct(ContactService $service, SocialNetworkService $networkService)
    {
        $this->service = $service;
        $this->networkService = $networkService;

        $pageService = new PageService();
        $this->page = $pageService->getByName('contato');
    }

    public function index()
    {
        $contato = $this->service->getByPageId($this->page->id);

        return view('admin.pages.contato', compact('contato'));
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
        $contact = $this->service->getByPageId($this->page->id);

        $this->service->save($request->all(), $contact);

        return back()->with('success','Contato atualizado com sucesso.');
    }

    public function createRede($contactId)
    {
        return view('admin.pages.redes-form-add', compact('contactId'));
    }

    public function storeRede(Request $request, $contactId)
    {
        $contact = $this->service->getById($contactId);

        $this->networkService->add($request->all(), $contact);

        return redirect()->route('content.contato.index');
    }

    public function editRede($contactId, $id)
    {
        $network = $this->networkService->getById($id);

        return view('admin.pages.redes-form-edit', compact('network'));
    }

    public function updateRede(Request $request, $contactId, $id)
    {
        $network = $this->networkService->getById($id);

        $this->networkService->update($request->all(), $network);

        return redirect()->route('content.contato.index');
    }

    public function destroyRede($contactId, $id)
    {
        $network = $this->networkService->getById($id);

        $this->networkService->destroy($network);

        return back();
    }

}
