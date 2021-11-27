<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('auth.login');
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

        if (config('passauth.email_verification') && !$response['data'] ->hasVerifiedEmail()) {
            return redirect() ->route('app.verification.notice');
        }

        return redirect() ->route('app.user.profile');
    }
}
