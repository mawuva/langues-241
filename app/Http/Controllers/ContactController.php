<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display contact view
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('contact');
    }

    /**
     * Handle register request
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle()
    {

    }

    /**
     * handle newsletter registration
     *
     * @return void
     */
    public function newsletter()
    {
        
    }
}
