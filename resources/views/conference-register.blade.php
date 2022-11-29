       @extends('layouts.indicons.main-layout')
       @section('content')
       <style>
           #countdown {
               position: static !important;
           }

           .inner-page ul li {
               width: auto;
           }

           .form-control:focus {
               border-color: #4aba70;
           }

           .login-form {

               margin: 0 auto;
               padding: 30px 0;
           }

           .login-form form {
               border-radius: 1px;
               background: #9152f8;
               background: -webkit-linear-gradient(top, #7579ff, #b224ef);

               border: 1px solid #f3f3f3;
               box-shadow: 0px 2px 2px rgb(0 0 0 / 30%);
               padding: 30px;

               color: #ffff;
               width: 100%;
               margin: auto;
           }

           .login-form h4 {
               text-align: center;
               font-size: 31px;
               margin-bottom: 20px;
           }

           .login-form .avatar {
               color: #fff;
               margin: 0 auto 30px;
               text-align: center;
               width: 100px;
               height: 100px;
               border-radius: 50%;
               z-index: 9;
               background: #4aba70;
               padding: 15px;
               box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
           }

           .login-form .avatar i {
               font-size: 62px;
           }

           .login-form .form-group {
               margin-bottom: 20px;
           }

           .login-form .form-control,
           .login-form .btn {
               min-height: 40px;
               border-radius: 2px;
               transition: all 0.5s;
           }

           .login-form .close {
               position: absolute;
               top: 15px;
               right: 15px;
           }

           .login-form .btn {
               background: #000000;
               border: none;
               line-height: normal;
               border-radius: 25px;
               padding: 10px 60px;
               margin: auto;
               display: table;
           }

           .login-form .btn:hover,
           .login-form .btn:focus {
               background: #42ae68;
           }

           .login-form .checkbox-inline {
               float: left;
           }

           .login-form input[type="checkbox"] {
               margin-top: 2px;
           }

           .login-form .forgot-link {
               float: right;
           }

           .login-form .small {
               font-size: 13px;
           }

           .login-form a {
               color: #4aba70;
           }
       </style>

       <div class="title">Registration</div>

       <div class="inner-count" style="position: relative;">
           <h4 class="text-center">{{ucwords(str_replace('_', ' ', $registrationConfig->name))}} Registration</h4>
           @include('partials.countdown')
       </div>


       <div class="row">

           @if (\Session::has('response'))
           <div class="alert alert-info">
               <ul>
                   <li>{!! \Session::get('response') !!}</li>
               </ul>
           </div>
           @endif
       </div>

       <div class="reg-table">
           <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
               <tr style="background:#5b8cef; color:#fff;">
                   <td colspan="5" scope="col">Physical Conference </td>

               </tr>
               <tr style="background:#5b8cef; color:#fff;">
                   <td colspan="2" scope="col"> Registration Category &#13; </td>
                   <td width="16%" scope="col"> Early bird Registration<br> (up to 15.12.22)&#13; </td>
                   <td width="14%" scope="col">Late registration
                       <br>
                       (up to 15.01.23)
                   </td>
                   <td width="16%" scope="col">Spot registration
                       <br>
                       (up to 29.01.23)
                   </td>
               </tr>
               <tr style="background: #002878;color: #fff;">
                   <td width="23%" rowspan="3" scope="col"> Full Registration&#13; </td>
                   <td width="19%" scope="col"> VAI members&#13; </td>
                   <td scope="col"> 10000 INR&#13; </td>
                   <td scope="col"> 11000 INR&#13; </td>
                   <td scope="col"> 12000 INR&#13; </td>
               </tr>
               <tr style="background: #002878;color: #fff;">
                   <td scope="col"> Non VAI members &#13; </td>
                   <td scope="col"> 11000 INR&#13; </td>
                   <td scope="col"> 12000 INR&#13; </td>
                   <td scope="col"> 15000 INR&#13; </td>
               </tr>
               <tr style="background: #002878;color: #fff;">
                   <td scope="col"> International Faculties&#13; </td>
                   <td scope="col"> 120 USD&#13; </td>
                   <td scope="col"> 135 USD&#13; </td>
                   <td scope="col"> 150 USD&#13; </td>
               </tr>
               <tr style="background: #5b8cef;color: #fff;">
                   <td scope="col"> Accompanying person <br />
                       (applied ONLY in case of full registration)&#13; </td>
                   <td colspan="4" scope="col"> 10000 INR or 120 USD&#13; </td>
               </tr>

               <tr style="background: #002878;color: #fff;">
                   <td width="23%" rowspan="4" scope="col"> Subsidized Registration&#13; </td>
                   <td width="19%" scope="col"> Nurses / Paramedics </td>
                   <td scope="col"> 3000 INR&#13; </td>
                   <td scope="col"> 4000 INR&#13; </td>
                   <td scope="col"> 5000 INR&#13; </td>
               </tr>
               <tr style="background: #002878;color: #fff;">
                   <td scope="col"> Students &#13; </td>
                   <td scope="col"> 3000 INR&#13; </td>
                   <td scope="col"> 4000 INR&#13; </td>
                   <td scope="col"> 5000 INR&#13; </td>
               </tr>
           </table>
       </div>

       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
       @endif

       <form method="POST" action="/registration" enctype="multipart/form-data">
           @csrf
           <div class="user__details">
               <div class="input__box">
                   <span class="details">Salutation</span>
                   <select name="title" id="title" class="form-control" required>
                       <option value="">-- choose one --</option>
                       @foreach (['Dr', 'Prof', 'Mr', 'Mrs', 'Ms'] as $title)
                       <option value="{{$title}}" {{old('title') == $title ? 'selected' : ''}}>{{$title}}</option>
                       @endforeach
                   </select>
               </div>

               <div class="input__box">
                   <span class="details">Full Name</span>
                   <input type="text" name="name" value="{{ old('name') }}" placeholder="E.g: John Smith" required>
               </div>

               <div class="input__box">
                   <span class="details">Email</span>
                   <input type="email" name="email" value="{{ old('email') }}" placeholder="johnsmith@hotmail.com" required>
               </div>

               <div class="input__box">
                   <span class="details">Image</span>
                   <input type="file" name="image" placeholder="Choose image" id="image">
               </div>

               <div class="input__box">
                   <span class="details">Phone Number</span>
                   <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="012-345-6789" required>
               </div>

               <div class="input__box">
                   <span class="details">Password <em class="text-muted" style="font-size: 12px;">(min. 8 characters)</em></span>
                   <input type="password" name="password" placeholder="********" required>
               </div>
               <div class="input__box">
                   <span class="details">Confirm Password</span>
                   <input type="password" name="password_confirmation" placeholder="********" required>
               </div>

               <div class="input__box">
                   <span class="details">Position / Department</span>
                   <input type="text" name="department" value="{{ old('department') }}" required>
               </div>
               <div class="input__box">
                   <span class="details">Organization / Company </span>
                   <input type="text" name="company" value="{{ old('company') }}" required>
               </div>

               <div class="input__box">
                   <span class="details">Address</span>
                   <input type="text" name="address" value="{{ old('address') }}" required>
               </div>
               <div class="input__box">
                   <span class="details">Postal Code </span>
                   <input type="text" name="postal_code" value="{{ old('postal_code') }}" required>
               </div>

               <div class="input__box">
                   <span class="details">Country </span>
                   <select class="form-control" data-val="true" data-val-required="The Country field is required." id="country" name="country">
                       <option value="">-- choose one --</option>

                       @foreach ($countries as $countryKey => $countryName)
                        <option value="{{$countryName}}" {{old('country') == $countryName ? 'selected' : ''}}>{{$countryName}}</option>
                       @endforeach
                   </select>
               </div>

               <div class="input__box">
                   <span class="details">City</span>
                   <input type="text" name="city" value="{{ old('city') }}" required>
               </div>

               <div class="input__box">
                   <span class="details">Registration Type</span>
                   <select class="form-control" id="registration_type" name="registration_type" required>
                       <option value="">-- choose one --</option>
                       @foreach ($roles as $role)
                       <option value="{{$role->id}}" {{old('registration_type') == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                       @endforeach
                   </select>
               </div>

               <div class="input__box">
                   <span class="details">Are you an existing VAI Member?</span>
                   <select class="form-control mb-2" id="is_vaicon_member" name="is_vaicon_member" required>
                       <option value="">-- choose one --</option>
                       <option value="yes" {{old('is_vaicon_member') == 'yes' ? 'selected' : ''}}>Yes</option>
                       <option value="no" {{old('is_vaicon_member') == 'no' ? 'selected' : ''}}>No</option>
                   </select>

                   <input type="text" class="d-none" placeholder="Enter valid VAICON member id" name="vaicon_member_id" id="vaicon_member_id" value="{{ old('vaicon_member_id') }}">
               </div>

               <div style="clear:both;"> </div>

               <label class="agree" id="privacy_policy_check" style="width: 15rem;">
                   <input style="width: 20px; height: 20px; position: relative;top: 4px;" id="privacy_policy_check" name="privacy_policy_check" type="checkbox" required>
                   I agree to the <a href="{{route('privacypolicy')}}" target="_blank">Privacy Policy</a>
               </label>

           </div>

           <div class="button">
               <input type="submit" value="Register" />
           </div>
       </form>


       <div class="row">
           <div class="col-md-10">
               <h2>FULL REGISTRATION INCLUDES </h2>
               <ul>
                   <li> Access to the congress sessions. </li>
                   <li>Access to all workshops.</li>
                   <li>Access to the industry exhibition and poster area.</li>
                   <li>Congress bag.</li>


                   <li>Access to congress abstracts.</li>
                   <li>Electronic book</li>
                   <li>Access to CULTURAL EVENTS AND GALA DINNER.</li>

                   <li>
                       <span style="text-transform: uppercase;">
                           <strong> Subsidised regristration :</strong> does not include cultural events and gala dinner.
                       </span>
                   </li>
               </ul>

           </div>

       </div>

       <img src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">

       <script>
           $(function() {
               const monthDay = "{{$registrationDayMonth}}" + '/';

               addCountdownTimer(monthDay);

               const $vaiconMemberInput = $('#vaicon_member_id');

               $('#is_vaicon_member').change(function() {
                   const selectedOption = $(this).val();

                   if (selectedOption === 'yes') {
                       $vaiconMemberInput.removeClass('d-none');
                   } else {
                       $vaiconMemberInput.addClass('d-none');
                   }
               });
           });
       </script>
       @stop
