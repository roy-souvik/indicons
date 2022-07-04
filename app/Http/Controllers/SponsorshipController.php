<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function sponsorshipShow()
    {
        $sponsorships = Sponsorship::with(['features'])->get();

        return view('sponsorship', compact('sponsorships'));
    }
}
