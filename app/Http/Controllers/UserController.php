<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfilePage()
    {
        $user = User::with(['companions', 'role'])->find(Auth::user()->id);

        $paymentSlabItem = null;
        $accompanyingPersonFees = null;

        if (!$user->isSuperAdmin()) {
            $paymentSlabItem = Fee::where('role_id', $user->role->id)->firstOrFail();
            $accompanyingPersonRole = Role::firstWhere('key', 'accompanying_person');
            $accompanyingPersonFees = Fee::where('role_id', $accompanyingPersonRole->id)->firstOrFail();
        }

        return view('user-profile', compact(
            'user',
            'paymentSlabItem',
            'accompanyingPersonFees',
        ));
    }

    public function saveProfile(Request $request)
    {
        dd('Saving');
    }
}
