<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppLoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AppLoginRequest $request)
    {
        // Login via phone
        if (!filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $request->merge(['phone' => $request->username]);

            $this->validate($request, [
                'phone' => 'required|regex:/[0-9]{10}/|digits:10',
            ]);

            // Get user record
            $user = User::where('phone', $request->get('phone'))->first();

            if ($request->get('phone') != $user->phone) {
                Session::put('errors', 'Your mobile number does not match!');

                return back();
            }

            if (Auth::attempt($request->only('phone', 'password'))) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            }

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $request->merge(['email' => $request->email]);

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
