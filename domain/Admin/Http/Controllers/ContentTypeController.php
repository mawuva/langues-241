<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Training\Http\Requests\StoreContentTypeRequest;
use Domain\Training\Http\Requests\UpdateContentTypeRequest;
use Domain\Training\Services\ContentTypeService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContentTypeController extends Controller
{
    /**
     * @var \Domain\Training\Services\ContentTypeService
     */
    protected $contentTypeService;

    /**
     * Create new controller instance
     *
     * @param \Domain\Training\Services\ContentTypeService $contentTypeService
     */
    public function __construct(ContentTypeService $contentTypeService)
    {
        $this ->contentTypeService = $contentTypeService;
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = $this ->contentTypeService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['_id', 'name', 'slug']);

        return view('admin::content-type.index', ['contentTypes' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->contentTypeService 
                            ->fromRepo()
                            ->getOnlyTrashedRecords(false, false, null, ['_id', 'name', 'slug']);

        return view('admin::content-type.deleted', ['contentTypes' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::content-type.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreContentTypeRequest $request)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.content-types.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->contentTypeService ->getById($id, false, ['_id', 'name', 'slug', 'description']);

        return view('admin::content-type.show', ['contentType' => $response['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $response = $this ->contentTypeService ->getById($id, false, ['_id', 'name', 'slug', 'description']);

        return view('admin::content-type.edit', ['contentType' => $response['data']]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateContentTypeRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.content-types.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $response = $this ->contentTypeService ->delete($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.content-types.deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id)
    {
        $response = $this ->contentTypeService ->restore($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.content-types.index');
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id)
    {
        $response = $this ->contentTypeService ->destroy($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.content-types.deleted');
    }
}
