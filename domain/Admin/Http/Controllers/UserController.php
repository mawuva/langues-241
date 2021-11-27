<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Admin\Repositories\Criteria\User\IsNotAdmin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawuekom\Usercare\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    /**
     * Create new controller instance
     *
     * @param \Mawuekom\Usercare\Services\UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this ->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = $this ->userService 
                            ->fromRepo()
                            ->pushCriteria(new IsNotAdmin())
                            ->getRecordsWithoutTrashed(false, false, null);

        return view('admin::user.index', ['users' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->userService 
                            ->fromRepo()
                            ->pushCriteria(new IsNotAdmin())
                            ->getOnlyTrashedRecords(false, false, null);

        return view('admin::user.deleted', ['users' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->userService ->getById($id);

        return view('admin::user.show', ['user' => $response['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
