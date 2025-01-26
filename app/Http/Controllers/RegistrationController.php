<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AbstractUpdated;
use App\Models\AccompanyingPerson;
use App\Models\ConferenceAbstract;
use App\Models\RegistrationCharge;
use App\Models\Role;
use App\Models\SiteConfig;
use App\Models\User;
use App\Models\Workshop;
use App\Rules\AlphaSpace;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Razorpay\Api\Api;

class RegistrationController extends Controller
{
    private Api $api;

    public function __construct()
    {
        $paymentEnvironment = config('razorpay.mode');
        $keyId = config("razorpay.{$paymentEnvironment}")['key_id'];
        $keySecret = config("razorpay.{$paymentEnvironment}")['key_secret'];

        $this->api = new Api($keyId, $keySecret);
    }

    public function show(Request $request)
    {
        $delegateTypes = DB::table('delegate_types')->where('is_active', 1)->get();

        $validated = $request->validate([
            'type' => [Rule::in($delegateTypes->pluck('name')->all())],
        ]);

        $registrationTypeName = data_get($validated, 'type', $delegateTypes->pluck('name')->first());
        $selectedDelegateType = $delegateTypes->where('name', $registrationTypeName)->first();

        // Fetch registration charges based on the type
        $charges = RegistrationCharge::getByTypeId(
            $delegateTypes->where('name', $registrationTypeName)->pluck('id')->first()
        );

        $roles = Role::active()->get();

        $registrationPeriods = DB::table('registration_periods')->where('is_active', 1)->get();

        $earlyBirdPeriod = $registrationPeriods->where('id', 1)->first();
        $standardPeriod = $registrationPeriods->where('id', 2)->first();
        $latePeriod = $registrationPeriods->where('id', 3)->first();
        $spotConfig = $registrationPeriods->where('id', 4)->first();

        $earlyBirdDate = Carbon::createFromFormat('Y-m-d', $earlyBirdPeriod->date);
        $standardDate = Carbon::createFromFormat('Y-m-d', $standardPeriod->date);
        $lateDate = Carbon::createFromFormat('Y-m-d', $latePeriod->date);

        if (!$earlyBirdDate->isPast()) {
            $registrationPeriod = $earlyBirdPeriod;
        } elseif (!$standardDate->isPast()) {
            $registrationPeriod = $standardPeriod;
        } elseif (!$latePeriod->isPast()) {
            $registrationPeriod = $latePeriod;
        } else {
            $registrationPeriod = $spotConfig;
        }

        $registrationDayMonth = Carbon::createFromFormat('Y-m-d', $registrationPeriod->date)->format('m/d');

        $countries = [
            'AF' => 'Afghanistan',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'DS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CD' => 'Democratic Republic of the Congo',
            'CG' => 'Republic of Congo',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'HR' => 'Croatia (Hrvatska)',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'TP' => 'East Timor',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'FX' => 'France, Metropolitan',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GK' => 'Guernsey',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard and Mc Donald Islands',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'IM' => 'Isle of Man',
            'ID' => 'Indonesia',
            'IR' => 'Iran (Islamic Republic of)',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'CI' => 'Ivory Coast',
            'JE' => 'Jersey',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea, Democratic People\'s Republic of',
            'KR' => 'Korea, Republic of',
            'XK' => 'Kosovo',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macau',
            'MK' => 'North Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'TY' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States of',
            'MD' => 'Moldova, Republic of',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestine',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'SS' => 'South Sudan',
            'GS' => 'South Georgia South Sandwich Islands',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SH' => 'St. Helena',
            'PM' => 'St. Pierre and Miquelon',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard and Jan Mayen Islands',
            'SZ' => 'Eswatini',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania, United Republic of',
            'TH' => 'Thailand',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States minor outlying islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VA' => 'Vatican City State',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'VG' => 'Virgin Islands (British)',
            'VI' => 'Virgin Islands (U.S.)',
            'WF' => 'Wallis and Futuna Islands',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        ];

        return view('conference-register', compact(
            'roles',
            'registrationPeriod',
            'registrationDayMonth',
            'countries',
            'charges',
            'selectedDelegateType',
            'delegateTypes',
        ));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200', new AlphaSpace],
            'title' => ['required', 'string', 'max:10', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:8120'],
            'phone' => ['required', 'max:20', 'unique:users'],
            'company' => ['string', 'filled'],
            'postal_code' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'department' => ['required'],
            'address' => ['required'],
            'registration_type' => ['required', 'integer'], // Considered as role as in Role Model
            'privacy_policy_check' => ['required'],
            // 'is_vaicon_member' => ['required'],
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
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:8120'],
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
        $razorPayKey = $this->api->getKey();
        $user = auth()->user();

        $workshopAttendeeRole = Role::where('key', 'workshop_attendee')->firstOrFail();
        $workshopPrice = SiteConfig::where('name', 'workshop_price')->firstOrFail();
        $workshops = Workshop::active()->get();

        return view('workshop-register', compact(
            'workshopAttendeeRole',
            'workshopPrice',
            'workshops',
            'razorPayKey',
            'user',
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
        $from = data_get($data, 'email', 'No Email');
        $to = 'secretary@vaicon2023.com';
        $subject = 'Someone contacted us';

        $message = "<p>Below are the details from the contact us form.</p>
        <p>Name: {$data['name']}</p>
        <p>Email: {$data['email']}</p>
        <p>Email: {$data['phone']}</p>
        <p>Comment: {$data['comment']}</p>
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
