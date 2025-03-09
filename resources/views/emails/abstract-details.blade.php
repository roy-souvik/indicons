<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="font-size:19px;background:transparent;border:none">
                <img style="display:block" src="https://inpalms2025.com/indicons/images/banner-1.jpg" alt="image" width="700" data-image-whitelisted="">
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

                <h3>Please review the abstract.</h3>

                <h4>Abstract Details:</h4>

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

                    <tr>
                        <td width="132" valign="top">
                            <p><strong>Description</strong></p>
                        </td>
                        <td width="469" valign="top">
                            <p><strong>{{$abstract->description}}</strong></p>
                        </td>
                    </tr>
                </table>

                <br>
                @include('partials.email-footer')

            </td>
        </tr>
    </tbody>
</table>
