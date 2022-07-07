<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Sponsorship;
use App\Models\SponsorshipPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function sponsorshipShow()
    {
        $sponsorships = Sponsorship::with(['features'])->get();

        return view('sponsorships', compact('sponsorships'));
    }

    public function sponsorshipBuyPage(Sponsorship $sponsorship)
    {
        $sponsorship->load('features');

        $role = Role::where('key', 'sponsor')->first();

        return view('sponsorship-payment', compact('sponsorship', 'role'));
    }

    public function createSponsorshipPayment(Request $request)
    {
        $payment = new SponsorshipPayment();

        $payment->user_id = Auth::user()->id;
        $payment->sponsorship_id = data_get($request, 'sponsorship_id');
        $payment->transaction_id = $request->transaction_id;
        $payment->status = $request->status;
        $payment->amount = $request->amount;
        $payment->payment_response = json_encode($request->payment_response);

        $payment->save();

        return $payment;
    }
}
