<style>
    td {
        padding: 5px;
    }

    p {
        line-height: 21px;
    }
</style>

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="font-size:19px;background:transparent;border:none">
                <img style="display:block" src="https://inpalms2025.com/indicons/images/banner-1.jpg" alt="image"
                    width="700" data-image-whitelisted="">
            </td>
        </tr>
        <tr>
            <td style="border:none"></td>
        </tr>

        <tr>

            <td>

                <h2 style="text-align:center; padding:10px 0px;">REGISTRATION DETAILS & INVOICE </h2>
                <table border="1" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="206" valign="top">
                            <p><strong>Conference Name</strong></p>
                        </td>
                        <td width="488" valign="top">
                            <p>15TH INPALMS 2025<br>
                                Jointly organised by INPALMS and IAMLE</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="206" valign="top">
                            <p><strong>Conference Dates</strong></p>
                        </td>
                        <td width="488" valign="top">
                            <p><a name="_Hlk191556963">9th 10th&amp; 11th November 2025</a> </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="206" valign="top">
                            <p><strong>Venue</strong></p>
                        </td>
                        <td width="488" valign="top">
                            <p><a name="_Hlk191556988">The Westin, Kolkata</a> </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="206" valign="top">
                            <p><strong>Pre Conference workshops</strong></p>
                        </td>
                        <td width="488" valign="top">
                            <p>7th&amp; 8th November 2025</p>
                        </td>
                    </tr>
                </table>
                <table border="1" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="179" valign="top">
                            <p><strong>Registration ID</strong></p>
                        </td>
                        <td width="422" valign="top">
                            <p>{{ $payment->user->registration_id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="179" valign="top">
                            <p><strong>Transaction ID</strong></p>
                        </td>
                        <td width="422" valign="top">
                            <p>{{ $payment->transaction_id }}</p>
                        </td>
                    </tr>
                </table>

                @php
                    $registrationTypeColumn = $payment->registration_type . '_amount';
                    $memberAmount = $fee->{$registrationTypeColumn};

                    $companionsAmount = $payment->user->companions->reduce(function ($carry, $companion) {
                        $fee = !empty($companion->confirmed) ? intval($companion->fees) : 0;

                        return $carry + $fee;
                    });
                @endphp

                <p style="padding:10px;">Dear&nbsp;<strong>{{ $payment->user->getDisplayName() }},</strong><br>
                    Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata.<br>
                    Thank you for registering for 15th INPALMS, jointly organised by Indo-Pacific Association of Law,
                    Medicine, and Science (INPALMS) and Indian Academy of Medico Legal Experts (IAMLE); which takes
                    place on 9th 10th &amp; 11th November 2025 at The Westin, Kolkata; along with pre conference
                    workshops at various places on 7th and 8th November 2025.<strong> </strong></p>
                <p style="padding:10px;"><strong>Your Registration Details:</strong></p>
                <table border="1" cellspacing="4" cellpadding="8" style="border: 1px solid black;">
                    <tr>
                        <td>Registration type</td>
                        <td>{{ $payment->registration_type }}</td>
                        <td>{{ $fee->currency }} {{ $memberAmount }}</td>
                    </tr>
                    <tr>
                        <td>Accompanying person</td>
                        <td>{{ $payment->user?->companions->count() ?? 0 }} Person(s)</td>
                        <td>
                            {{ $payment->user->companions->count() ? $fee->currency : '' }} {{ $companionsAmount ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Accommodation</td>

                        @if ($payment->accommodations?->count())
                            <td>
                                <ul>
                                    @foreach ($payment->accommodations as $userRoom)
                                        <li>
                                            {{ $userRoom->room->room_category }} - {{ $userRoom->room->currency }}
                                            {{ $userRoom->room->amount }}
                                            |
                                            Room(s): {{ $userRoom->room_count }}
                                            |
                                            Date: {{ $userRoom->booking_date }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        @else
                            <td>N/A</td>
                        @endif
                        <td></td>
                    </tr>

                    @if (!empty($payment->coupon))
                        <tr>
                            <td>Coupon Code</td>
                            <td>{{ $payment->coupon->code }}</td>
                            <td>{{ $payment->coupon->percent_off }} % off</td>
                        </tr>
                    @endif

                    <tr>
                        <td>Pickup and Drop</td>
                        <td>{{ $payment->pickup_drop ? 'Yes' : 'No' }}</td>
                        <td>{{ $payment->pickup_drop ? $fee->currency . ' ' . $pickupDropPrice : 0 }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total:</td>
                        <td><strong>{{ $fee->currency }} {{ $payment->amount }}</strong></td>
                    </tr>
                </table>
                <p style="padding:10px;"><strong>Registration Cancellation / Refund Policy:</strong><br>
                    All refund/cancellation requests must be provided in writing.</p>
                <table border="1" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="200" valign="top">
                            <p><a name="_Hlk191560047"></a><a name="_Hlk191560013">Up to 30th June, 2025 </a> </p>
                        </td>
                        <td width="200" valign="top">
                            <p>Up to 31st August, 2025</p>
                        </td>
                        <td width="200" valign="top">
                            <p>1st September, 2025 onwards </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="200" valign="top">
                            <p>25% of Deduction </p>
                        </td>
                        <td width="200" valign="top">
                            <p>50% of Deduction </p>
                        </td>
                        <td width="200" valign="top">
                            <p>No Refund</p>
                        </td>
                    </tr>
                </table>
                <p style="padding:10px;"><strong>Hotel at Venue, Cancellation Policy:</strong><br>
                    Full Cancellation Deadline: Up to 30th June, 2025 (only tax will be deducted)<br>
                    Cancellations up to Up to 31st August, 2025: will be refunded after a 25% fee and Tax deduction.<br>
                    All refund/cancellation requests must be provided in writing and must be received by Up to 31st
                    August, 2025.</p>
                <p style="padding:10px;">Thanking You,<br>
                    15th INPALMS 2025 Secretariate.<br>
                    <a href="http://www.inpalms2025.com">www.inpalms2025.com</a> <br>
                    <a href="mailto:inpalmsiamle25@gmail.com">inpalmsiamle25@gmail.com</a>
                </p>
            </td>



        </tr>
    </tbody>
</table>
