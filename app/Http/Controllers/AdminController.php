<?php

namespace App\Http\Controllers;

use App\Mail\AbstractUpdated;
use App\Models\ConferenceAbstract;
use App\Models\ConferencePayment;
use App\Models\Fee;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function conferencePayments()
    {
        $payments = ConferencePayment::with('user')->completed()->get();

        return view('admin.conference-payments', compact('payments'));
    }

    public function abstractList()
    {
        $abstracts = ConferenceAbstract::with('user')->get();

        return view('admin.abstracts', compact('abstracts'));
    }

    public function manageFeesStructure()
    {
        $fees = Fee::with(['Role'])->where('event', 'conference_registration')->get();

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
        ]);

        $fees = Fee::where('id', data_get($requestData, 'id'))->firstOrFail();

        $fees->early_bird_amount = data_get($requestData, 'early_bird_amount');
        $fees->standard_amount = data_get($requestData, 'standard_amount');
        $fees->spot_amount = data_get($requestData, 'spot_amount');

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
}
