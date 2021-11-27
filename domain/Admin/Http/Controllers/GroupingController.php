<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Training\Http\Requests\StoreGroupingRequest;
use Domain\Training\Http\Requests\UpdateGroupingRequest;
use Domain\Training\Services\GroupingService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GroupingController extends Controller
{
    /**
     * @var \Domain\Training\Services\GroupingService
     */
    protected $groupingService;

    /**
     * Create new controller instance
     *
     * @param \Domain\Training\Services\GroupingService $groupingService
     */
    public function __construct(GroupingService $groupingService)
    {
        $this ->groupingService = $groupingService;
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = $this ->groupingService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['_id', 'name', 'slug']);

        return view('admin::grouping.index', ['groupings' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->groupingService 
                            ->fromRepo()
                            ->getOnlyTrashedRecords(false, false, null, ['_id', 'name', 'slug']);

        return view('admin::grouping.deleted', ['groupings' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::grouping.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreGroupingRequest $request)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.groupings.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->groupingService ->getById($id, false, ['_id', 'name', 'slug', 'description']);

        return view('admin::grouping.show', ['grouping' => $response['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $response = $this ->groupingService ->getById($id, false, ['_id', 'name', 'slug', 'description']);

        return view('admin::grouping.edit', ['grouping' => $response['data']]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateGroupingRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.groupings.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $response = $this ->groupingService ->delete($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.groupings.deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id)
    {
        $response = $this ->groupingService ->restore($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.groupings.index');
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id)
    {
        $response = $this ->groupingService ->destroy($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.groupings.deleted');
    }
}
