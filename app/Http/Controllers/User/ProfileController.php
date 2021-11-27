<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Domain\Training\Models\Enrollment;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile', ['page' =>'profile']);
    }

    public function courses()
    {
        $data = Enrollment::where('user_id', '=', auth() ->user()->id)
                    ->whith('courses')
                    ->get();

        return view('user.courses', ['page' =>'profile']);
    }
}
