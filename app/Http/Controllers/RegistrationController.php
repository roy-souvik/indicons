<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConferenceAbstract;
use App\Models\User;
use App\Rules\AlphaSpace;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:200', new AlphaSpace],
            'title' => ['required', 'string', 'max:10', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required'],
            'company' => ['required'],
            'postal_code' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'department' => ['required'],
            'address' => ['required'],
            'registration_type' => ['required', 'integer'], // Considered as role as in Role Model
            'privacy_policy_check' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->registration_type,
            'company' => $request->company,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'country' => $request->country,
            'department' => $request->department,
            'address' => $request->address,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('payment.show'));
    }

    public function saveAbstract(Request $request)
    {
        $validatedData = $request->validate([
            'heading' => ['required', 'string', 'max:250'],
            'theme' => ['required', 'string', 'max:250'],
            'co_author' => ['string', 'max:200', 'nullable'],
            'description' => ['required', 'string'],
            'qualification' => ['required', 'string', 'max:200'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5120'],
            'profession' => ['required', 'string', 'max:200'],
            'institution' => ['required', 'string', 'max:200'],
            'alternate_number' => ['max:20', 'nullable'],
        ]);

        $statements = implode(',', $request->input('statements', []));

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
        }

        $abstract = ConferenceAbstract::create([
            'user_id' => Auth::user()->id,
            'image' => $filename,
            'heading' => $request->input('heading'),
            'theme' => $request->input('theme'),
            'co_author' => $request->input('co_author'),
            'description' => $request->input('description'),
            'statements' => !empty($statements) ? $statements : null,
            'qualification' => $request->input('qualification'),
            'profession' => $request->input('profession'),
            'institution' => $request->input('institution'),
            'alternate_number' => $request->input('alternate_number'),
        ]);

        return view('abstract-saved', compact('abstract'));
    }
}
