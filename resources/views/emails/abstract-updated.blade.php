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
                <p>Registration ID: <b>{{$abstract->user->registration_id}}</b></p>

                <p>Abstract ID: <b>{{$abstract->abstract_id}}</b></p>

                <p>Dear <strong>{{$abstract->user->getDisplayName()}},</strong> </p>

                @if ($status != 'declined')
                <p>Warm greetings from the Organising Secretary. Welcome to the city of joy, Kolkata. </p>

                @if ($status == 'confirmed')
                <p>
                    We are pleased to inform you that the abstract you submitted to the Scientific Committee has been accepted for PRESENTATION.
                </p>
                @endif

                @else

                <p>
                We are sorry to inform you that the abstract you submitted to the Scientific Committee has been rejected for PRESENTATION.
                </p>

                @endif

                <h4>Your Abstract Details:</h4>

                <div style="clear:both"></div>

                <table border="1" cellspacing="0" cellpadding="2">
                    <tr>
                        <td width="132" valign="top">
                            <p><strong>Abstract ID</strong></p>
                        </td>
                        <td width="469" valign="top">
                            <p><strong>{{$abstract->abstract_id}}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="132" valign="top">
                            <p><strong>Abstract title</strong></p>
                        </td>
                        <td width="469" valign="top">
                            <p><strong>{{$abstract->heading}}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="132" valign="top">
                            <p><strong>Theme</strong></p>
                        </td>
                        <td width="469" valign="top">
                            <p><strong>{{ucfirst($abstract->theme)}}</strong></p>
                        </td>
                    </tr>
                    @if ($status != 'declined')
                    <tr>
                        <td width="132" valign="top">
                            <p><strong>Presentation mode</strong></p>
                        </td>
                        <td width="469" valign="top">
                            <p><strong>Podium presentation / poster presentation</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="132" valign="top">
                            <p><strong>Presenting time</strong></p>
                        </td>
                        <td width="469" valign="top">
                            <p><strong>5 min / 1 pm to 2 pm &ndash; on 27 and 28 January, 2022</strong></p>
                        </td>
                    </tr>
                    @endif
                </table>

                <br>
                Thanking you.<br><br>
                <p><strong>Website: </strong> <a style="color: #3b2b98; text-decoration: none;" href="http://www.vaicon2023.com">www.vaicon2023.com </a> </p>
                <p><strong>Email: </strong> <a style="color: #3b2b98; text-decoration: none;" href="mailto:vaicon2023@gmail.com">vaicon2023@gmail.com</a></p>

            </td>
        </tr>
    </tbody>
</table>
