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
                <p>Conference: <b>{{config('site.app_title')}}.</b></p>
                <p>Venue: <b>THE WESTIN, KOLKATA, WEST BENGAL, INDIA</b></p>
                <p>Dates: <b>9th, 10th and 11th November, 2025</b></p>

                <h5>Registration ID: {{$payment->user->registration_id}}</h5>
                <h5>Transaction ID: {{$payment->transaction_id}}</h5>

                <p>Dear <strong>{{$payment->user->getDisplayName()}},</strong> </p>
                <p>Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata. </p>

                <p>
                    Thank you for registering for workshop of {{config('site.app_title')}}, which takes place 9th to 11th November 2025 at The Westin, Kolkata, India.
                </p>


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
                <p><strong>Website: </strong> <a style="color: #3b2b98; text-decoration: none;" href="http://www.inpalms2025.com">www.inpalms2025.com </a> </p>
                <p><strong>Email: </strong> <a style="color: #3b2b98; text-decoration: none;" href="mailto:iivsdoc@gmail.com">iivsdoc@gmail.com</a></p>

            </td>
        </tr>
    </tbody>
</table>
