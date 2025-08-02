<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        width: 900px;
    }

    .pdf-container {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    table {
        width: 90%;
        border-collapse: collapse;
    }

    td {
        padding: 1px;
        vertical-align: top;
    }
</style>

<div class="pdf-container">
    <table border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="font-size:1.2rem; background:transparent; border:none">
                    <img style="display:block" src="https://inpalms2025.com/indicons/images/banner-1.jpg" alt="image"
                        width="600" data-image-whitelisted="">
                </td>
            </tr>
            <tr>
                <td>

                    <h4 style="text-align:center; padding:5px 0px;">REGISTRATION DETAILS & INVOICE </h4>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td valign="top">
                                <p><strong>Conference Name</strong></p>
                            </td>
                            <td valign="top">
                                <p>15TH INPALMS 2025
                                    <br>
                                    Jointly organised by INPALMS and IAMLE
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <p><strong>Conference Dates</strong></p>
                            </td>
                            <td valign="top">
                                <p><a name="_Hlk191556963">9th, 10th, &amp; 11th November 2025</a> </p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <p><strong>Venue</strong></p>
                            </td>
                            <td valign="top">
                                <p><a name="_Hlk191556988">The Westin, Kolkata</a> </p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <p><strong>Pre Conference workshops</strong></p>
                            </td>
                            <td valign="top">
                                <p>7th&amp; 8th November 2025</p>
                            </td>
                        </tr>
                    </table>
                    @php
                        $registrationTypeColumn = $payment->registration_type . '_amount';
                        $memberAmount = $payment->amount;

                        $companionsAmount = $payment->user->companions->reduce(function ($carry, $companion) {
                            $fee = !empty($companion->confirmed) ? intval($companion->fees) : 0;

                            return $carry + $fee;
                        });
                    @endphp

                    <p style="padding: 0.5rem;">
                        Dear&nbsp;<strong>{{ $payment->user->getDisplayName() }},</strong>
                        <br />
                        <br />
                        Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata.<br>
                        Thank you for registering for 15th INPALMS, jointly organised by Indo-Pacific <br />Association
                        of Law,
                        Medicine, and Science (INPALMS) and Indian Academy of Medico Legal <br />Experts (IAMLE); which
                        takes
                        place on 9th 10th &amp; 11th November 2025 at The Westin, Kolkata; <br />along with pre
                        conference
                        workshops at various places on 7th and 8th November 2025.
                    </p>
                    <p><strong>Your Workshop Details:</strong></p>
                    {{--  --}}
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>Registration type</td>
                            <td>{{ $payment->registrationCharge->registrationPeriod->name }}</td>
                            <td>{{ $payment->registrationCharge->currency }} {{ $memberAmount }}</td>
                        </tr>
                        <tr>
                            <td>Accompanying person</td>
                            <td>{{ $payment->user?->companions->count() ?? 0 }} Person(s)</td>
                            <td>
                                {{ $payment->user->companions->count()
                                    ? $payment->registrationCharge->currency
                                    : ''
                                }}
                                {{ $companionsAmount ?? 0 }}
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>Total:</td>
                            <td><strong>{{ $payment->registrationCharge->currency }} {{ $payment->amount }}</strong></td>
                        </tr>
                    </table>
                    {{--  --}}
                    <p style="padding: 5px;"><strong>Registration Cancellation / Refund Policy:</strong><br>
                        All refund/cancellation requests must be provided in writing.</p>
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">
                                <p><a name="_Hlk191560047"></a><a name="_Hlk191560013">Up to 30th June, 2025 </a> </p>
                            </td>
                            <td valign="top">
                                <p>Up to 31st August, 2025</p>
                            </td>
                            <td valign="top">
                                <p>1st September, 2025 onwards </p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <p>25% of Deduction </p>
                            </td>
                            <td valign="top">
                                <p>50% of Deduction </p>
                            </td>
                            <td valign="top">
                                <p>No Refund</p>
                            </td>
                        </tr>
                    </table>

                    <p style="padding:5px; margin-bottom: 0.5rem;">Thanking You,<br>
                        15th INPALMS 2025 Secretariate.<br>
                        <a href="http://www.inpalms2025.com">www.inpalms2025.com</a> <br>
                        <a href="mailto:inpalmsiamle25@gmail.com">inpalmsiamle25@gmail.com</a>
                    </p>
                </td>

            </tr>
        </tbody>
    </table>
</div>
