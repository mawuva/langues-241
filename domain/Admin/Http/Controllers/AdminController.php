<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Admin\Repositories\Criteria\User\IsAdmin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mawuekom\Usercare\Http\Requests\StoreUserRequest;
use Mawuekom\Usercare\Http\Requests\UpdateUserRequest;
use Mawuekom\Usercare\Services\UserService;

class AdminController extends Controller
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
                            ->pushCriteria(new IsAdmin())
                            ->getRecordsWithoutTrashed(false, false, null);

        return view('admin::admin.index', ['admins' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->userService 
                            ->fromRepo()
                            ->pushCriteria(new IsAdmin())
                            ->getOnlyTrashedRecords(false, false, null);

        return view('admin::admin.deleted', ['admins' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreUserRequest $request)
    {
        $response = $request ->fulfill();
        
        $response['data'] ->email_verified_at = now();
        $response['data'] ->save();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.admins.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->userService ->getById($id);

        return view('admin::admin.show', ['admin' => $response['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $response = $this ->userService ->getById($id);

        return view('admin::admin.edit', ['admin' => $response['data']]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.admins.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $response = $this ->userService ->delete($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.admins.deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id)
    {
        $response = $this ->userService ->restore($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.admins.index');
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id)
    {
        $response = $this ->userService ->destroy($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.admins.deleted');
    }
}
