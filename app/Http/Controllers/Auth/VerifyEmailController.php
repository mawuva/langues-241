<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mawuekom\Passauth\Services\VerifyEmail;

class VerifyEmailController extends Controller
{
    /**
     * Handle email verification request
     *
     * @param \Mawuekom\Passauth\Services\VerifyEmail $verifyEmail
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function __invoke(VerifyEmail $verifyEmail, Request $request)
    {
        $response = $verifyEmail($request ->route('id'), $request ->route('hash'));

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.user.profile');
    }
}
