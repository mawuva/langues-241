<?php

namespace Domain\Admin\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Mawuekom\Passauth\Http\Requests\LoginUserRequest;

class LoginController extends Controller
{
    /**
     * Display user login view
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('admin::auth.login');
    }

    /**
     * Handle login request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle(LoginUserRequest $request)
    {
        $response = $request->fulfill();

        Auth::login($response['data']);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.dashboard');
    }
}
