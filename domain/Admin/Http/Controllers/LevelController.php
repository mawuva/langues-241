<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Training\Http\Requests\StoreLevelRequest;
use Domain\Training\Http\Requests\UpdateLevelRequest;
use Domain\Training\Services\LevelService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LevelController extends Controller
{
    /**
     * @var \Domain\Training\Services\LevelService
     */
    protected $levelService;

    /**
     * Create new controller instance
     *
     * @param \Domain\Training\Services\LevelService $levelService
     */
    public function __construct(LevelService $levelService)
    {
        $this ->levelService = $levelService;
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = $this ->levelService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['_id', 'name', 'slug']);

        return view('admin::level.index', ['levels' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->levelService 
                            ->fromRepo()
                            ->getOnlyTrashedRecords(false, false, null, ['_id', 'name', 'slug']);

        return view('admin::level.deleted', ['levels' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::level.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreLevelRequest $request)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.levels.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->levelService ->getById($id, false, ['_id', 'name', 'slug', 'description']);

        return view('admin::level.show', ['level' => $response['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $response = $this ->levelService ->getById($id, false, ['_id', 'name', 'slug', 'description']);

        return view('admin::level.edit', ['level' => $response['data']]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateLevelRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.levels.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $response = $this ->levelService ->delete($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.levels.deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id)
    {
        $response = $this ->levelService ->restore($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.levels.index');
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id)
    {
        $response = $this ->levelService ->destroy($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.levels.deleted');
    }
}
