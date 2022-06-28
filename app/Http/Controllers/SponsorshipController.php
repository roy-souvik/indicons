<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function sponsorshipShow()
    {
        return view('sponsorship');
    }
}
