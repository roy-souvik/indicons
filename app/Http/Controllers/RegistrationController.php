<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AbstractUpdated;
use App\Mail\ContactUs;
use App\Models\AccompanyingPerson;
use App\Models\ConferenceAbstract;
use App\Models\Role;
use App\Models\SiteConfig;
use App\Models\User;
use App\Models\Workshop;
use App\Rules\AlphaSpace;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200', new AlphaSpace],
            'title' => ['required', 'string', 'max:10', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5120'],
            'phone' => ['required', 'max:20', 'unique:users'],
            'company' => ['string', 'filled'],
            'postal_code' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'department' => ['required'],
            'address' => ['required'],
            'registration_type' => ['required', 'integer'], // Considered as role as in Role Model
            'privacy_policy_check' => ['required'],
            'is_vaicon_member' => ['required'],
            'vaicon_member_id' => ['string', 'nullable'], // TODO: check exist from DB table
        ]);

        $filename = null;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $filename,
            'phone' => $request->phone,
            'role_id' => $request->registration_type,
            'company' => $request->input('company'),
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'country' => $request->country,
            'department' => $request->department,
            'address' => $request->address,
            'vaicon_member_id' => $request->input('vaicon_member_id'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($request->input('module') === 'abstract') {
            return redirect(route('abstract.dates'));
        }

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

        Mail::to(Auth::user())->send(new AbstractUpdated($abstract, 'submitted'));

        return view('abstract-saved', compact('abstract'));
    }

    public function getAccompanyingPersons()
    {
        return AccompanyingPerson::where('user_id', Auth::user()->id)->get();
    }

    public function createAccompanyingPerson(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:250'],
            'title' => ['required', 'string', 'max:10'],
            'email' => ['email', 'nullable'],
            'fees' => ['required', 'max:10'],
        ]);

        $requestData = $request->only([
            'title',
            'name',
            'email',
            'fees',
        ]);

        $requestData['user_id'] = Auth::user()->id;

        return AccompanyingPerson::create($requestData);
    }

    public function deleteAccompanyingPerson(int $id)
    {
        $person = AccompanyingPerson::findOrFail($id);

        return $person->delete();
    }

    public function workshopRegisterShow()
    {
        $workshopAttendeeRole = Role::where('key', 'workshop_attendee')->firstOrFail();
        $workshopPrice = SiteConfig::where('name', 'workshop_price')->firstOrFail();
        $workshops = Workshop::active()->get();

        return view('workshop-register', compact(
            'workshopAttendeeRole',
            'workshopPrice',
            'workshops',
        ));
    }

    public function contactUsEmail(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', new AlphaSpace],
            'email' => ['required', 'string', 'email', 'max:200'],
            'phone' => ['required', 'max:20'],
            'comment' => ['string', 'max:500'],
        ]);

        $requestData = $request->only([
            'name',
            'email',
            'phone',
            'comment',
        ]);

        $response = $this->sendMail($requestData);

        // Mail::to('secretary@vaicon2023.com')->send(new ContactUs($requestData));

        return redirect()->back()->with([
            'response' => $response,
        ]);
    }

    private function sendMail(array $data)
    {
        $from = data_get($this->data, 'email', 'No Email');
        // $to = 'secretary@vaicon2023.com';
        $to = 'souvik0789@gmail.com';
        $subject = 'Someone contacted us';

        $message = "
   <html>
   <head>
       <title>This is a test HTML email</title>
   </head>
   <body>
       <p>Below are the details from the contatc us form.</p>

       <p>Name: {{$data['name']}}</p>
       <p>Email: {{$data['email']}}</p>
       <p>Email: {{$data['phone']}}</p>
       <p>Comment: {{$data['comment']}}</p>
   </body>
   </html>
   ";

        // The content-type header must be set when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = "From:" . $from;

        if (mail($to, $subject, $message, $headers)) {
            return "Message was sent.";
        } else {
            return "Message was not sent.";
        }
    }
}
