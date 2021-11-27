<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mawuekom\Passauth\Http\Requests\PasswordResetRequest;

class PasswordResetController extends Controller
{
    /**
     * Display user login view
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('auth.password-reset');
    }

    /**
     * Handle login request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle(PasswordResetRequest $request)
    {
        $response = $request->fulfill();

        // redirect to login with message
    }
}
