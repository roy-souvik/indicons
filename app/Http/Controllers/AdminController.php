<?php

namespace App\Http\Controllers;

use App\Models\ConferenceAbstract;
use App\Models\ConferencePayment;
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
            $abstract = ConferenceAbstract::findOrFail(data_get($requestData, 'id'));

            $abstract->confirmed = data_get($requestData, 'confirmed');

            $abstract->save();

            // TODO: Send email here

            return back()->with('success', 'Abstract confirmed successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
