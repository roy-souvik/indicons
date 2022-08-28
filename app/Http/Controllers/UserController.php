<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfilePage()
    {
        return view('user-profile');
    }

    public function saveProfile(Request $request)
    {
        dd('Saving');
    }
}
