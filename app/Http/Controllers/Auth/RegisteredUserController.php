<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'max:20', 'unique:users'],
            'company' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5120'],
        ]);

        $filename = null;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $filename,
            'password' => Hash::make($request->password),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->back()->with([
            'success' => 'Registration successful',
        ]);
    }
}
