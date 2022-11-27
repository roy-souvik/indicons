<?php

namespace App\Http\Controllers;

use App\Mail\AbstractUpdated;
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
}
