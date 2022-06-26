<div>
    <h2>Payment successful</h2>

    <h3>Conference: VAICON 2023</h3>
    <h5>Venue: PALA BALL ROOM, ITC SONAR</h5>
    <p>1, JBS HALDANE AVENUE, KOLKATA - 700 046, WEST BENGAL, INDIA</p>

    <p>Dates: 27th , 28th and 29th January, 2023</p>

    <h5>Transaction ID: {{$payment->transaction_id}}</h5>
    <h5>Registration ID: {{$payment->user->registration_id}}</h5>

    <h5>Dear {{$payment->user->getDisplayName()}},</h5>

    <p>
        Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata.
        Thank you for registering for VAICON 2023, which takes place 27 th to 29 th January 2023 at ITC Sonar,
        Kolkata, India.
    </p>

    <p>Your payment has been successfully processed and your registration has been confirmed.</p>

    <h5>Your Registration Details:</h5>

    <div>

        @php
        $registrationTypeColumn = $payment->registration_type . '_amount';
        $memberAmount = $fee->{$registrationTypeColumn};

        $companionsAmount = $payment->user->companions->reduce(function ($carry, $companion) {
        $fee = !empty($companion->confirmed) ? intval($companion->fees) : 0;

        return $carry + $fee;
        });
        @endphp

        <p></p>
        <table border="1">
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
    </div>

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
</div>
