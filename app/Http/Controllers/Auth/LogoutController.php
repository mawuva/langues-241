<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle logout request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle()
    {
        Auth::logout();

        notiflash_toast(
            "success", 
            trans('lang-resources::commons.messages.successfully.logout.message'),
            trans('lang-resources::commons.messages.successfully.logout.title')
        );

        return redirect() ->route('app.auth.login');
    }
}
