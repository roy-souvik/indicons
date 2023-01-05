<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exports\AbstractExport;
use App\Http\Controllers\Exports\ConferencePaymentExport;
use App\Mail\AbstractSend;
use App\Mail\AbstractUpdated;
use App\Mail\PaymentSuccess;
use App\Models\AdminRegistration;
use App\Models\ConferenceAbstract;
use App\Models\ConferencePayment;
use App\Models\Fee;
use App\Models\Role;
use App\Models\SiteConfig;
use App\Models\Sponsorship;
use App\Models\SponsorshipFeature;
use App\Models\SponsorshipPayment;
use App\Models\User;
use App\Models\VaiMember;
use App\Models\WorkshopPayment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $registrationCount = ConferencePayment::completed()->count();
        $abstractCount = ConferenceAbstract::count();
        $workshopRegistrationCount = WorkshopPayment::completed()->count();

        return view('admin.home', compact('registrationCount', 'abstractCount', 'workshopRegistrationCount'));
    }

    public function conferencePayments()
    {
        $payments = ConferencePayment::with([
            'user.companions',
            'accommodations.room',
        ])
            ->completed()
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.conference-payments', compact('payments'));
    }

    public function workshopPayments()
    {
        $payments = WorkshopPayment::with(['user', 'workshop'])->completed()->orderBy('id', 'desc')->get();

        return view('admin.workshop-payments', compact('payments'));
    }

    public function abstractList()
    {
        $abstracts = ConferenceAbstract::with('user')->orderBy('id', 'desc')->get();

        return view('admin.abstracts', compact('abstracts'));
    }

    public function manageFeesStructure()
    {
        $fees = Fee::with(['Role'])->where('event', 'physical_conference')->get();

        return view('admin.fees-structure', compact('fees'));
    }

    public function updateFeesStructure(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $requestData = $request->only([
            'id',
            'early_bird_amount',
            'standard_amount',
            'spot_amount',
            'early_bird_member_discount',
            'standard_member_discount',
            'spot_member_discount',
            'saarc_discount'
        ]);

        $fees = Fee::where('id', data_get($requestData, 'id'))->firstOrFail();

        $fees->early_bird_amount = data_get($requestData, 'early_bird_amount');
        $fees->standard_amount = data_get($requestData, 'standard_amount');
        $fees->spot_amount = data_get($requestData, 'spot_amount');

        $fees->early_bird_member_discount = data_get($requestData, 'early_bird_member_discount');
        $fees->standard_member_discount = data_get($requestData, 'standard_member_discount');
        $fees->spot_member_discount = data_get($requestData, 'spot_member_discount');
        $fees->saarc_discount = data_get($requestData, 'saarc_discount', 0);

        $fees->save();

        return $fees;
    }

    public function abstractUpdate(Request $request)
    {
        $requestData = $request->only([
            'id',
            'confirmed'
        ]);

        $request->validate([
            'id' => ['required', 'integer'],
            'confirmed' => ['boolean'],
        ]);

        try {
            $abstract = ConferenceAbstract::with(['user'])->findOrFail(data_get($requestData, 'id'));

            $abstract->confirmed = data_get($requestData, 'confirmed');

            $abstract->save();

            if (!empty($abstract->confirmed)) {
                $status = 'confirmed';
            } else {
                $status = 'declined';
            }

            Mail::to($abstract->user)->send(new AbstractUpdated($abstract, $status));

            $message = "Abstract {$abstract->abstract_id} is {$status}";

            return back()->with('success', $message);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function sponsorshipShow()
    {
        $sponsorships = Sponsorship::all();

        return view('admin.sponsorship-list', compact('sponsorships'));
    }

    public function sponsorshipFeaturesShow(Sponsorship $sponsorship)
    {
        $sponsorship->load('features');

        return view('admin.sponsorship-features', compact('sponsorship'));
    }

    public function sponsorshipFeaturesCreate(Sponsorship $sponsorship, Request $request)
    {
        $feature = new SponsorshipFeature();

        $feature->sponsorship_id = $sponsorship->id;
        $feature->title = $request->title;

        $feature->save();

        return redirect()->back()->with([
            'success' => 'Feature created successfully',
        ]);
    }

    public function sponsorshipFeaturesDelete(SponsorshipFeature $feature)
    {
        $feature->delete();

        return redirect()->back()->with([
            'success' => 'Feature deleted successfully',
        ]);
    }

    public function sponsorshipDelete(Sponsorship $sponsorship)
    {
        $sponsorship->delete();

        return redirect()->back()->with([
            'success' => 'Sponsorship deleted successfully',
        ]);
    }

    public function sponsorshipEdit(Sponsorship $sponsorship)
    {
        return view('admin.sponsorship-edit', compact('sponsorship'));
    }

    public function sponsorshipUpdate(Sponsorship $sponsorship, Request $request)
    {
        $sponsorship->title = data_get($request, 'title', $sponsorship->title);
        $sponsorship->amount = data_get($request, 'amount', $sponsorship->amount);
        $sponsorship->number = data_get($request, 'number', $sponsorship->number);
        $sponsorship->color = data_get($request, 'color', $sponsorship->color);

        $sponsorship->save();

        return redirect(route('admin.sponsorship.show'))->with([
            'success' => 'Sponsorship updated successfully',
        ]);
    }

    public function configShow()
    {
        $configList = SiteConfig::all();

        return view('admin.config', compact('configList'));
    }

    public function configUpdate(SiteConfig $config, Request $request)
    {
        $request->validate([
            'config_value' => ['required', 'string', 'nullable'],
        ]);

        $config->value = $request->input('config_value');

        $config->save();

        return $config;
    }

    public function sponsorshipPaymentsShow()
    {
        $sponsorshipPayments = SponsorshipPayment::with(['sponsorship', 'user'])->get();

        return view('admin.sponsorship-payments', compact('sponsorshipPayments'));
    }

    public function workshopPaymentsShow()
    {
        $payments = WorkshopPayment::with(['workshop', 'user'])->orderBy('id', 'desc')->get();

        return view('admin.workshop-payments', compact('payments'));
    }

    public function vaiMembersShow()
    {
        $members = VaiMember::all();

        return view('admin.vai-members', compact('members'));
    }

    public function conferenceRegistrations()
    {
        $roles = Role::forConference()->active()->get();
        $users = User::whereNotIn('role_id', $roles->pluck('id')->toArray())->get();

        return view('admin.conference-registrations', compact('users'));
    }

    public function resendConferenceEmail(Request $request)
    {
        $request->validate([
            'txn_id' => ['required', 'string'],
            'user_id' => ['required', 'integer'],
        ]);

        $user = User::findOrFail($request->user_id);
        $payment = ConferencePayment::where('transaction_id', $request->txn_id)->where('user_id', $user->id)->firstOrFail();

        Mail::to($user)->send(new PaymentSuccess($payment->transaction_id));

        return response()->json([
            'data' => $payment,
        ]);
    }

    public function paymentPdf(Request $request)
    {
        $transactionId = $request->transaction_id;

        $data = ConferencePayment::getPaymentReceiptData($transactionId);

        $pdf = Pdf::loadView('emails.payment-success', $data);

        return $pdf->download($transactionId . '.pdf');
    }

    public function exportPayments()
    {
        return (new ConferencePaymentExport())->export();
    }

    public function exportAbstracts()
    {
        return (new AbstractExport())->export();
    }

    public function sendAbstract(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'abstract_id' => ['required', 'numeric'],
        ]);

        $abstract = ConferenceAbstract::findOrFail($request->abstract_id);

        $email = $request->input('email');

        try {
            Mail::to($email)->send(new AbstractSend($abstract));

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function showRegistratons()
    {
        $registrations = AdminRegistration::all();

        return view('admin.registrations', compact('registrations'));
    }

    public function showCreateUsersPage()
    {
        return view('admin.create-registration');
    }

    public function createUsers(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:200', 'unique:admin_registrations'],
            'address' => ['string', 'max:250'],
            'home_pickup_drop' => ['required', 'boolean'],
            'conference_city_pickup_drop' => ['required', 'boolean'],
            'airplane_booking' => ['required', 'boolean'],
            'stay_dates' => ['required'],
        ]);

        try {
            $adminRegister = new AdminRegistration();

            $adminRegister->name = $request->input('name');
            $adminRegister->phone = $request->input('phone');
            $adminRegister->email = $request->input('email');
            $adminRegister->address = $request->input('address');
            $adminRegister->home_pickup_drop = $request->input('home_pickup_drop');
            $adminRegister->conference_city_pickup_drop = $request->input('conference_city_pickup_drop');
            $adminRegister->airplane_booking = $request->input('airplane_booking');
            $adminRegister->stay_dates = implode(',', $request->input('stay_dates'));

            $adminRegister->save();

            return redirect(route('admin.register.show'))->with([
                'success' => 'Registration added successfully.',
            ]);
        } catch (\Throwable $th) {
            return redirect(route('admin.register.show'))->with([
                'error' => 'Unable to create registration.',
            ]);
        }
    }
}
