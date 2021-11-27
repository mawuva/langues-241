<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mawuekom\Passauth\Services\SendEmailVerificationNotification;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Display user login view
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('auth.email-verification');
    }

    /**
     * Send new email verification link
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function request(SendEmailVerificationNotification $sendEmailVerificationNotification)
    {
        $response = $sendEmailVerificationNotification(auth()->user() ->id);

        notiflash_toast($response['status'], $response['message']);

        return back();
    }
}
