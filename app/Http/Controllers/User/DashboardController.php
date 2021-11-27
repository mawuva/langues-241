<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Domain\Training\Models\Enrollment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Enrollment::with('course') ->where('user_id', '=', auth() ->user()->id)
                    ->get();

        return view('user.dashboard', ['page' =>'dashboard', 'enrollments' => $data]);
    }
}
