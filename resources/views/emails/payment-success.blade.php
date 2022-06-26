<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="font-size:19px;background:transparent;border:none">
                <img style="display:block" src="https://indicons.in/email/im-mail.jpg" alt="image" width="700" data-image-whitelisted="">
            </td>
        </tr>
        <tr>
            <td style="border:none"></td>
        </tr>

        <tr>
            <td style="background-color:#fff;padding-left:30px;padding-right:30px;font-size:12px;padding-top:30px;padding-bottom:40px">
                <p>Conference: <b>VAICON 2023.</b></p>
                <p>Venue: <b>PALA BALL ROOM, ITC SONAR 1, JBS HALDANE AVENUE,KOLKATA - 700 046, WEST BENGAL, INDIA</b></p>
                <p>Dates: <b>27th, 28th and 29th January, 2023</b></p>

                <h5>Registration ID: {{$payment->user->registration_id}}</h5>
                <h5>Transaction ID: {{$payment->transaction_id}}</h5>

                <p>Dear <strong>{{$payment->user->getDisplayName()}},</strong> </p>
                <p>Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata. </p>

                <p>
                    Thank you for registering for VAICON 2023, which takes place 27 th to 29 th January 2023 at ITC Sonar,
                    Kolkata, India.
                </p>

                <h4>Your Abstract Details:</h4>

                <div style="clear:both"></div>

                @php
                $registrationTypeColumn = $payment->registration_type . '_amount';
                $memberAmount = $fee->{$registrationTypeColumn};

                $companionsAmount = $payment->user->companions->reduce(function ($carry, $companion) {
                $fee = !empty($companion->confirmed) ? intval($companion->fees) : 0;

                return $carry + $fee;
                });
                @endphp

                <table border="1" cellspacing="0" cellpadding="2">
                    <tr>
                        <td>Registration Category</td>
                        <td>Registration type</td>
                        <td>Amount</td>
                    </tr>
                    <tr>
                        <td>VAI members</td>
                        <td>{{$payment->registration_type}}</td>
                        <td>{{$fee->currency}} {{$memberAmount}}</td>
                    </tr>
                    <tr>
                        <td>Accompanying person</td>
                        <td>{{$payment->user->companions->count()}} Person(s)</td>
                        <td>{{$fee->currency}} {{$companionsAmount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{$fee->currency}} {{$payment->amount}}</td>
                    </tr>
                </table>

                <h5>Cancellation Policy:</h5>

                <ul>
                    <li>Cancellation Date: 31 December 2022.</li>
                    <li>
                        All refund/cancellation requests must be provided in writing and received by 31 December
                        2022. There will be an administrative fee of 25% deducted from each refund. After 31
                        December 2022, no refunds will be given for registration cancellations.
                    </li>
                </ul>

                <h5>Hotel at Venue, Cancellation Policy:</h5>

                <ul>
                    <li>Full Cancellation Deadline: 31 December 2022.</li>
                    <li>Cancellations up to 31 st December 2022 will be refunded after a 25% fee deduction</li>
                    <li>
                        All refund/cancellation requests must be provided in writing and received by 31 December
                        2022.
                    </li>
                </ul>

                <br>
                Thanking you.<br><br>
                <p><strong>Website: </strong> <a style="color: #3b2b98; text-decoration: none;" href="http://www.vaicon2023.com">www.vaicon2023.com </a> </p>
                <p><strong>Email: </strong> <a style="color: #3b2b98; text-decoration: none;" href="mailto:vaicon2023@gmail.com">vaicon2023@gmail.com</a></p>

            </td>
        </tr>
    </tbody>
</table>
