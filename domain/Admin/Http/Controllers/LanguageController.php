<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Training\Http\Requests\StoreLanguageRequest;
use Domain\Training\Http\Requests\UpdateLanguageRequest;
use Domain\Training\Services\LanguageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LanguageController extends Controller
{
    /**
     * @var \Domain\Training\Services\LanguageService
     */
    protected $languageService;

    /**
     * Create new controller instance
     *
     * @param \Domain\Training\Services\LanguageService $languageService
     */
    public function __construct(LanguageService $languageService)
    {
        $this ->languageService = $languageService;
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = $this ->languageService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', '_id', 'name', 'slug'], [
                                'image' =>function ($query) {
                                    $query ->select('filename', 'url_sm', 'imageable_id', 'imageable_type');
                                }
                            ]);

        return view('admin::language.index', ['languages' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->languageService 
                            ->fromRepo()
                            ->getOnlyTrashedRecords(false, false, null, ['id', '_id', 'name', 'slug'], [
                                'image' =>function ($query) {
                                    $query ->select('filename', 'url_sm', 'imageable_id', 'imageable_type');
                                }
                            ]);

        return view('admin::language.deleted', ['languages' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::language.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreLanguageRequest $request)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.languages.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->languageService ->getById($id, false, [
                        'id', '_id', 'name', 'slug', 'short_description', 'description'
                    ], [
                        'image' =>function ($query) {
                            $query ->select('filename', 'url_lg', 'imageable_id', 'imageable_type');
                        }
                    ]);

        return view('admin::language.show', ['language' => $response['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $response = $this ->languageService ->getById($id, false, [
                        'id', '_id', 'name', 'slug', 'short_description', 'description'
                    ], [
                        'image' =>function ($query) {
                            $query ->select('filename', 'url_lg', 'imageable_id', 'imageable_type');
                        }
                    ]);

        return view('admin::language.edit', ['language' => $response['data']]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateLanguageRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.languages.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $response = $this ->languageService ->delete($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.languages.deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id)
    {
        $response = $this ->languageService ->restore($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.languages.index');
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id)
    {
        $response = $this ->languageService ->destroy($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.languages.deleted');
    }
}
