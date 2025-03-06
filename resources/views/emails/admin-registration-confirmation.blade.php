<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="font-size:19px;background:transparent;border:none">
                <img style="display:block" src="{{url('email-images/email-banner.jpeg')}}" alt="image" width="700" data-image-whitelisted="">
            </td>
        </tr>
        <tr>
            <td style="border:none"></td>
        </tr>

        <tr>
            <td style="background-color:#fff;padding-left:30px;padding-right:30px;font-size:12px;padding-top:30px;padding-bottom:40px">
                <p>Conference: <b>{{config('site.app_title')}}.</b></p>
                <p>Venue: <b>PALA BALL ROOM, ITC SONAR 1, JBS HALDANE AVENUE,KOLKATA - 700 046, WEST BENGAL, INDIA</b></p>
                <p>Dates: <b>27th, 28th and 29th January, 2023</b></p>

                <h5>Registration ID: {{$registration->registration_id}}</h5>

                <p>Dear <strong>{{$registration->name}},</strong> </p>
                <p>Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata. </p>

                <p>
                    Thank you for registering for {{config('site.app_title')}}, which takes place 27 th to 29 th January 2023 at ITC Sonar,
                    Kolkata, India.
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
                        <td>{{$registration->home_pickup_drop ? 'Yes' : 'No'}}</td>
                    </tr>

                    <tr>
                        <td>Kolkata pickup and drop</td>
                        <td>{{$registration->conference_city_pickup_drop ? 'Yes' : 'No'}}</td>
                    </tr>

                    <tr>
                        <td>Airplane booking</td>
                        <td>{{$registration->airplane_booking ? 'Yes' : 'No'}}</td>
                    </tr>

                    <tr>
                        <td>Stay dates</td>
                        <td>{{$registration->stay_dates ?? 'N/A'}}</td>
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
                <p><strong>Email: </strong> <a style="color: #3b2b98; text-decoration: none;" href="mailto:secretary@vaicon2023.com">secretary@vaicon2023.com</a></p>
            </td>
        </tr>
    </tbody>
</table>
