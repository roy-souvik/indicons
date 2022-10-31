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


       <div style="background: #df0000;
    color: #fff;
    text-align: center;
    display: table;
    margin: 10px auto;
    padding: 10px 20px;
    font-size: 21px;
    border: 1px solid;;">Registration will start 03.11.2022 </div>


       <div class="inner-count" style="position: relative;">
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
                   <span class="details">Password</span>
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
                       <option value="Afghanistan">Afghanistan</option>
                       <option value="Albania">Albania</option>
                       <option value="Algeria">Algeria</option>
                       <option value="American Samoa">American Samoa</option>
                       <option value="Andorra">Andorra</option>
                       <option value="Angola">Angola</option>
                       <option value="Anguilla">Anguilla</option>
                       <option value="Antarctica">Antarctica</option>
                       <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                       <option value="Argentina">Argentina</option>
                       <option value="Armenia">Armenia</option>
                       <option value="Aruba">Aruba</option>
                       <option value="Australia">Australia</option>
                       <option value="Austria">Austria</option>
                       <option value="Azerbaijan">Azerbaijan</option>
                       <option value="Bahamas">Bahamas</option>
                       <option value="Bahrain">Bahrain</option>
                       <option value="Bangladesh">Bangladesh</option>
                       <option value="Barbados">Barbados</option>
                       <option value="Belarus">Belarus</option>
                       <option value="Belgium">Belgium</option>
                       <option value="Belize">Belize</option>
                       <option value="Benin">Benin</option>
                       <option value="Bermuda">Bermuda</option>
                       <option value="Bhutan">Bhutan</option>
                       <option value="Bolivia">Bolivia</option>
                       <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                       <option value="Botswana">Botswana</option>
                       <option value="Bouvet Island">Bouvet Island</option>
                       <option value="Brazil">Brazil</option>
                       <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                       <option value="Brunei Darussalam">Brunei Darussalam</option>
                       <option value="Bulgaria">Bulgaria</option>
                       <option value="Burkina Faso">Burkina Faso</option>
                       <option value="Burundi">Burundi</option>
                       <option value="Cambodia">Cambodia</option>
                       <option value="Cameroon">Cameroon</option>
                       <option value="Canada">Canada</option>
                       <option value="Cape Verde">Cape Verde</option>
                       <option value="Cayman Islands">Cayman Islands</option>
                       <option value="Central African Republic">Central African Republic</option>
                       <option value="Chad">Chad</option>
                       <option value="Chile">Chile</option>
                       <option value="China">China</option>
                       <option value="Christmas Island">Christmas Island</option>
                       <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                       <option value="Colombia">Colombia</option>
                       <option value="Comoros">Comoros</option>
                       <option value="Congo">Congo</option>
                       <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                       <option value="Cook Islands">Cook Islands</option>
                       <option value="Costa Rica">Costa Rica</option>
                       <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                       <option value="Croatia">Croatia</option>
                       <option value="Cuba">Cuba</option>
                       <option value="Cyprus">Cyprus</option>
                       <option value="Czech Republic">Czech Republic</option>
                       <option value="Denmark">Denmark</option>
                       <option value="Djibouti">Djibouti</option>
                       <option value="Dominica">Dominica</option>
                       <option value="Dominican Republic">Dominican Republic</option>
                       <option value="Ecuador">Ecuador</option>
                       <option value="Egypt">Egypt</option>
                       <option value="El Salvador">El Salvador</option>
                       <option value="Equatorial Guinea">Equatorial Guinea</option>
                       <option value="Eritrea">Eritrea</option>
                       <option value="Estonia">Estonia</option>
                       <option value="Ethiopia">Ethiopia</option>
                       <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                       <option value="Faroe Islands">Faroe Islands</option>
                       <option value="Fiji">Fiji</option>
                       <option value="Finland">Finland</option>
                       <option value="France">France</option>
                       <option value="French Guiana">French Guiana</option>
                       <option value="French Polynesia">French Polynesia</option>
                       <option value="French Southern Territories">French Southern Territories</option>
                       <option value="Gabon">Gabon</option>
                       <option value="Gambia">Gambia</option>
                       <option value="Georgia">Georgia</option>
                       <option value="Germany">Germany</option>
                       <option value="Ghana">Ghana</option>
                       <option value="Gibraltar">Gibraltar</option>
                       <option value="Greece">Greece</option>
                       <option value="Greenland">Greenland</option>
                       <option value="Grenada">Grenada</option>
                       <option value="Guadeloupe">Guadeloupe</option>
                       <option value="Guam">Guam</option>
                       <option value="Guatemala">Guatemala</option>
                       <option value="Guinea">Guinea</option>
                       <option value="Guinea-Bissau">Guinea-Bissau</option>
                       <option value="Guyana">Guyana</option>
                       <option value="Haiti">Haiti</option>
                       <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                       <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                       <option value="Honduras">Honduras</option>
                       <option value="Hong Kong">Hong Kong</option>
                       <option value="Hungary">Hungary</option>
                       <option value="Iceland">Iceland</option>
                       <option value="India">India</option>
                       <option value="Indonesia">Indonesia</option>
                       <option value="Iran">Iran</option>
                       <option value="Iraq">Iraq</option>
                       <option value="Ireland">Ireland</option>
                       <option value="Israel">Israel</option>
                       <option value="Italy">Italy</option>
                       <option value="Jamaica">Jamaica</option>
                       <option value="Japan">Japan</option>
                       <option value="Jordan">Jordan</option>
                       <option value="Kazakhstan">Kazakhstan</option>
                       <option value="Kenya">Kenya</option>
                       <option value="Kiribati">Kiribati</option>
                       <option value="North Korea">North Korea</option>
                       <option value="South Korea">South Korea</option>
                       <option value="Kuwait">Kuwait</option>
                       <option value="Kyrgyzstan">Kyrgyzstan</option>
                       <option value="Laos">Laos</option>
                       <option value="Latvia">Latvia</option>
                       <option value="Lebanon">Lebanon</option>
                       <option value="Lesotho">Lesotho</option>
                       <option value="Liberia">Liberia</option>
                       <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                       <option value="Liechtenstein">Liechtenstein</option>
                       <option value="Lithuania">Lithuania</option>
                       <option value="Luxembourg">Luxembourg</option>
                       <option value="Macao">Macao</option>
                       <option value="Macedonia">Macedonia</option>
                       <option value="Madagascar">Madagascar</option>
                       <option value="Malawi">Malawi</option>
                       <option value="Malaysia">Malaysia</option>
                       <option value="Maldives">Maldives</option>
                       <option value="Mali">Mali</option>
                       <option value="Malta">Malta</option>
                       <option value="Marshall Islands">Marshall Islands</option>
                       <option value="Martinique">Martinique</option>
                       <option value="Mauritania">Mauritania</option>
                       <option value="Mauritius">Mauritius</option>
                       <option value="Mayotte">Mayotte</option>
                       <option value="Mexico">Mexico</option>
                       <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                       <option value="Moldova">Moldova</option>
                       <option value="Monaco">Monaco</option>
                       <option value="Mongolia">Mongolia</option>
                       <option value="Montserrat">Montserrat</option>
                       <option value="Morocco">Morocco</option>
                       <option value="Mozambique">Mozambique</option>
                       <option value="Myanmar">Myanmar</option>
                       <option value="Namibia">Namibia</option>
                       <option value="Nauru">Nauru</option>
                       <option value="Nepal">Nepal</option>
                       <option value="The Netherlands">The Netherlands</option>
                       <option value="Netherlands Antilles">Netherlands Antilles</option>
                       <option value="New Caledonia">New Caledonia</option>
                       <option value="New Zealand">New Zealand</option>
                       <option value="Nicaragua">Nicaragua</option>
                       <option value="Niger">Niger</option>
                       <option value="Nigeria">Nigeria</option>
                       <option value="Niue">Niue</option>
                       <option value="Norfolk Island">Norfolk Island</option>
                       <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                       <option value="Norway">Norway</option>
                       <option value="Oman">Oman</option>
                       <option value="Pakistan">Pakistan</option>
                       <option value="Palau">Palau</option>
                       <option value="Palestine">Palestine</option>
                       <option value="Panama">Panama</option>
                       <option value="Papua New Guinea">Papua New Guinea</option>
                       <option value="Paraguay">Paraguay</option>
                       <option value="Peru">Peru</option>
                       <option value="Philippines">Philippines</option>
                       <option value="Pitcairn">Pitcairn</option>
                       <option value="Poland">Poland</option>
                       <option value="Portugal">Portugal</option>
                       <option value="Puerto Rico">Puerto Rico</option>
                       <option value="Qatar">Qatar</option>
                       <option value="Reunion">Reunion</option>
                       <option value="Romania">Romania</option>
                       <option value="Russian Federation">Russian Federation</option>
                       <option value="Rwanda">Rwanda</option>
                       <option value="Saint Helena">Saint Helena</option>
                       <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                       <option value="Saint Lucia">Saint Lucia</option>
                       <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                       <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                       <option value="Samoa">Samoa</option>
                       <option value="San Marino">San Marino</option>
                       <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                       <option value="Saudi Arabia">Saudi Arabia</option>
                       <option value="Senegal">Senegal</option>
                       <option value="Serbia">Serbia</option>
                       <option value="Seychelles">Seychelles</option>
                       <option value="Sierra Leone">Sierra Leone</option>
                       <option value="Singapore">Singapore</option>
                       <option value="Slovakia">Slovakia</option>
                       <option value="Slovenia">Slovenia</option>
                       <option value="Solomon Islands">Solomon Islands</option>
                       <option value="Somalia">Somalia</option>
                       <option value="South Africa">South Africa</option>
                       <option value="Spain">Spain</option>
                       <option value="Sri Lanka">Sri Lanka</option>
                       <option value="Sudan">Sudan</option>
                       <option value="Suriname">Suriname</option>
                       <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                       <option value="Swaziland">Swaziland</option>
                       <option value="Sweden">Sweden</option>
                       <option value="Switzerland">Switzerland</option>
                       <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                       <option value="Taiwan">Taiwan</option>
                       <option value="Tajikistan">Tajikistan</option>
                       <option value="Tanzania">Tanzania</option>
                       <option value="Thailand">Thailand</option>
                       <option value="Timor-Leste">Timor-Leste</option>
                       <option value="Togo">Togo</option>
                       <option value="Tokelau">Tokelau</option>
                       <option value="Tonga">Tonga</option>
                       <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                       <option value="Tunisia">Tunisia</option>
                       <option value="Turkey">Turkey</option>
                       <option value="Turkmenistan">Turkmenistan</option>
                       <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                       <option value="Tuvalu">Tuvalu</option>
                       <option value="Uganda">Uganda</option>
                       <option value="Ukraine">Ukraine</option>
                       <option value="United Arab Emirates">United Arab Emirates</option>
                       <option value="United Kingdom">United Kingdom</option>
                       <option value="United States">United States</option>
                       <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                       <option value="Uruguay">Uruguay</option>
                       <option value="Uzbekistan">Uzbekistan</option>
                       <option value="Vanuatu">Vanuatu</option>
                       <option value="Venezuela">Venezuela</option>
                       <option value="Viet Nam">Viet Nam</option>
                       <option value="Virgin Islands, British">Virgin Islands, British</option>
                       <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                       <option value="Wallis and Futuna">Wallis and Futuna</option>
                       <option value="Western Sahara">Western Sahara</option>
                       <option value="Yemen">Yemen</option>
                       <option value="Zambia">Zambia</option>
                       <option value="Zimbabwe">Zimbabwe</option>
                       <option value="Montenegro">Montenegro</option>
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
           <div class="col-md-6">
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

           <div class="col-md-6">

               <div class="login-form">
                   <form action="/contact-us" method="POST">
                       @csrf

                       <h4 class="modal-title" style="margin-bottom:0px; font-size: 44px;">Be in touch </h4>
                       <p style="text-align:center; color:#fff;"> Leave your details </p>
                       <div class="form-group">
                           <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                       </div>

                       <div class="form-group">
                           <input type="text" name="phone" class="form-control" placeholder="Phone" required="required">
                       </div>

                       <div class="form-group">
                           <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                       </div>

                       <div class="form-group">
                           <textarea name="comment" class="form-control" cols="50" rows="5"></textarea>
                       </div>

                       <input type="submit" class="btn btn-primary btn-block btn-lg" value="Submit">
                   </form>
               </div>
           </div>

       </div>

       <img src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">

       <script>
           $(function() {
               addCountdownTimer('11/04/');
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
