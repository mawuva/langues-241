<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mawuekom\Passauth\Http\Requests\PasswordForgotRequest;

class PasswordForgotController extends Controller
{
    /**
     * Display user login view
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('auth.password-forgot');
    }

    /**
     * Handle login request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle(PasswordForgotRequest $request)
    {
        $response = $request->fulfill();
    }
}
