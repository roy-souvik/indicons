<?php

namespace App\Http\Controllers;

use App\Models\ConferenceAbstract;
use App\Models\ConferencePayment;
// use Illuminate\Http\Request;

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
}
