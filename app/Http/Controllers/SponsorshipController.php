<?php

namespace App\Http\Controllers;

use App\Mail\SponsorshipPaymentSuccess;
use App\Models\Role;
use App\Models\Sponsorship;
use App\Models\SponsorshipPayment;
use App\Models\UserSponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SponsorshipController extends Controller
{
    public function sponsorshipShow()
    {
        $sponsorships = Sponsorship::with(['features'])->get();

        return view('sponsorships', compact('sponsorships'));
    }

    public function sponsorshipBuyPage()
    {
        $userSponsorships = UserSponsorship::with(['user', 'sponsorship'])
            ->where('user_id', auth()->user()->id)
            ->where('is_active', 0)
            ->get();

        return view('sponsorship-payment', compact('userSponsorships'));
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

        Mail::to(Auth::user())->send(new SponsorshipPaymentSuccess($request->transaction_id));

        return $payment;
    }

    public function saveUserSponsorship(Sponsorship $sponsorship)
    {
        /*
            $sponsorship->load('features', 'payments');
            $role = Role::where('key', 'sponsor')->first();

            if (is_null($sponsorship->number)) {
                $isSponsorshipAvailable = true;
            } elseif ($sponsorship->number <= 0) {
                $isSponsorshipAvailable = false;
            } else {
                $isSponsorshipAvailable = $sponsorship->number > $sponsorship->payments->count();
            }

            return view('sponsorship-payment', compact('sponsorship', 'role', 'isSponsorshipAvailable'));
        */

        $userSponsorship = tap(new UserSponsorship, function ($userSponsorship) use ($sponsorship) {
            $userSponsorship->user_id = auth()->user()->id;
            $userSponsorship->sponsorship_id = $sponsorship->id;
            $userSponsorship->save();
        });

        return response()->json([
            'data' => $userSponsorship,
            'success' => 'Sponsorship added successfully',
        ]);
    }

    public function removeUserSponsorship(Sponsorship $sponsorship)
    {
        UserSponsorship::where('user_id', auth()->user()->id)
            ->where('sponsorship_id', $sponsorship->id)
            ->delete();

        return response()->json(['message' => 'Sponsorship deleted successfully']);
    }
}
