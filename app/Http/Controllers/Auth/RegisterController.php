<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mawuekom\Passauth\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    /**
     * Display user register view
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('auth.register');
    }

    /**
     * Handle register request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle(RegisterUserRequest $request)
    {
        $response = $request->fulfill();

        Auth::login($response['data']);

        if (config('passauth.email_verification')) {
            return redirect() ->route('app.verification.notice');
        }

        return redirect() ->route('app.user.profile');
    }
}
