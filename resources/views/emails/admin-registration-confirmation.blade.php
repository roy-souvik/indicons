<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="font-size:19px;background:transparent;border:none">
                <img style="display:block" src="https://inpalms2025.com/indicons/images/banner-1.jpg" alt="image"
                    width="600" data-image-whitelisted="">
            </td>
        </tr>
        <tr>
            <td style="border:none"></td>
        </tr>

        <tr>
            <td
                style="background-color:#fff;padding-left:30px;padding-right:30px;font-size:12px;padding-top:30px;padding-bottom:40px">
                <p>Conference: <b>{{ config('site.app_title') }}.</b></p>
                <p>Venue: <b>Fairfield by Marriott, KOLKATA, WEST BENGAL, INDIA</b></p>
                <p>Dates: <b>9th, 10th and 11th November, 2025</b></p>

                <h5>Registration ID: {{ $registration->registration_id }}</h5>

                <p>Dear <strong>{{ $registration->name }},</strong> </p>
                <p>Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata. </p>

                <p>
                    Thank you for registering for {{ config('site.app_title') }}, which takes place 9th to 11th November
                    2025 at Fairfield by Marriott, Kolkata, India.
                </p>

                <h4>Your Registration Details:</h4>

                <div style="clear:both"></div>

                <table border="1" cellspacing="4" cellpadding="8" style="border: 1px solid black;">
                    <tr>
                        <td>Registration type</td>
                        <td>By System Admin</td>
                    </tr>

                    <tr>
                        <td>Home city pickup and drop</td>
                        <td>{{ $registration->home_pickup_drop ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>Kolkata pickup and drop</td>
                        <td>{{ $registration->conference_city_pickup_drop ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>Airplane booking</td>
                        <td>{{ $registration->airplane_booking ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>Stay dates</td>
                        <td>{{ $registration->stay_dates ?? 'N/A' }}</td>
                    </tr>

                </table>

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
                <p style="padding:10px; margin-bottom: 0.5rem;">
                    <strong>Hotel at Venue, Cancellation Policy:</strong>
                    <br>
                    Full Cancellation Deadline: Up to 30th June, 2025 (only tax will be deducted)<br>
                    Cancellations up to Up to 31st August, 2025: will be refunded after a 25% fee and Tax
                    deduction.<br>
                    All refund/cancellation requests must be provided in writing and must be <br />received by Up to
                    31st
                    August, 2025.
                </p>
                <p style="padding:5px; margin-bottom: 0.5rem;">Thanking You,<br>
                    15th INPALMS 2025 Secretariate.<br>
                    <a href="http://www.inpalms2025.com">www.inpalms2025.com</a> <br>
                    <a href="mailto:inpalmsiamle25@gmail.com">inpalmsiamle25@gmail.com</a>
                </p>

                <br>
                @include('partials.email-footer')
            </td>
        </tr>
    </tbody>
</table>
