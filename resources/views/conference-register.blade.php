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
               <h4 class="text-center">
                   {{ $registrationPeriod->name }} Registration
               </h4>
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

           <div class="reg-table" style="display: flex; flex-direction: column;">

               <ul class="nav nav-pills nav-fill">
                   @foreach ($delegateTypes as $type)
                       <li class="nav-item">
                           <a class="nav-link {{ $selectedDelegateType->name === $type->name ? 'active' : '' }}"
                               aria-current="page" href="{{ route('conference-register.show', ['type' => $type->name]) }}">
                               {{ $type->description }}
                           </a>
                       </li>
                   @endforeach
               </ul>

               <br>

               <table border="1">
                   <thead>
                       <tr>
                           <th>Category</th>
                           <th>Registration Period</th>
                           <th>Amount</th>
                       </tr>
                   </thead>
                   <tbody>
                       @forelse($charges as $charge)
                           <tr>
                               <td>{{ $charge->category }}</td>
                               <td>{{ $registrationPeriod->name }}</td>
                               <td>
                                    @php
                                        $role = $roles->where('name', $charge->category)->first();
                                    @endphp

                                    @if (!empty($role?->id))
                                        <button type="button" data-value="{{ $role?->id }}" class="btn btn-link select-role">
                                            {{ $charge->display_amount }}
                                        </button>
                                    @else
                                        {{ $charge->display_amount }}
                                    @endif
                                </td>
                           </tr>
                       @empty
                           <tr>
                               <td colspan="3">No charges found for this type.</td>
                           </tr>
                       @endforelse
                   </tbody>
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

           <form method="POST" id="conference-register-form" action="/registration" enctype="multipart/form-data">
               @csrf
               <div class="user__details">
                   <div class="input__box">
                       <span class="details">Salutation</span>
                       <select name="title" id="title" class="form-control" required>
                           <option value="">-- choose one --</option>
                           @foreach (['Dr', 'Prof', 'Mr', 'Mrs', 'Ms'] as $title)
                               <option value="{{ $title }}" {{ old('title') == $title ? 'selected' : '' }}>
                                   {{ $title }}</option>
                           @endforeach
                       </select>
                   </div>

                   <div class="input__box">
                       <span class="details">Full Name</span>
                       <input type="text" name="name" value="{{ old('name') }}" required>
                   </div>

                   <div class="input__box">
                       <span class="details">Email</span>
                       <input type="email" name="email" value="{{ old('email') }}" required>
                   </div>

                   <!-- <div class="input__box">
                                   <span class="details">Image</span>
                                   <input type="file" name="image" placeholder="Choose image" id="image">
                               </div> -->

                   <div class="input__box">
                       <span class="details">Phone Number</span>
                       <input type="tel" name="phone" value="{{ old('phone') }}" required>
                   </div>

                   <div class="input__box">
                       <span class="details">
                           Password
                           <em class="text-muted" style="font-size: 12px;">(min. 8characters)</em>

                           <button class="btn btn-text" id="togglePassword">show</button>
                       </span>
                       <input type="password" id="password" name="password" required>
                   </div>
                   <div class="input__box">
                       <span class="details">Confirm Password</span>
                       <input type="password" name="password_confirmation" required>
                   </div>

                   <div class="input__box">
                       <span class="details">
                           Position / Department <em class="text-muted" style="font-size: 12px;">(optional)</em>
                       </span>
                       <input type="text" name="department" value="{{ old('department') }}">
                   </div>
                   <div class="input__box">
                       <span class="details">
                           Organization / Company <em class="text-muted" style="font-size: 12px;">(optional)</em>
                       </span>
                       <input type="text" name="company" value="{{ old('company') }}">
                   </div>

                   <div class="input__box">
                       <span class="details">Address <em class="text-muted" style="font-size: 12px;">(optional)</em></span>
                       <input type="text" name="address" value="{{ old('address') }}">
                   </div>
                   <div class="input__box">
                       <span class="details">Postal Code <em class="text-muted"
                               style="font-size: 12px;">(optional)</em></span>
                       <input type="text" name="postal_code" value="{{ old('postal_code') }}">
                   </div>

                   <div class="input__box">
                       <span class="details">Country </span>
                       <select class="form-control" data-val="true" data-val-required="The Country field is required."
                           id="country" name="country">
                           <option value="">-- choose one --</option>

                           @foreach ($countries as $countryKey => $countryName)
                               <option value="{{ $countryName }}" {{ old('country') == $countryName ? 'selected' : '' }}>
                                   {{ $countryName }}</option>
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
                               <option value="{{ $role->id }}"
                                   {{ old('registration_type') == $role->id ? 'selected' : '' }}>{{ $role->name }}
                               </option>
                           @endforeach
                       </select>
                   </div>

                   <div style="clear:both;"> </div>

                   <label class="agree" id="privacy_policy_check" style="width: 15rem;">
                       <input style="width: 20px; height: 20px; position: relative;top: 4px;" id="privacy_policy_check"
                           name="privacy_policy_check" type="checkbox" required>
                       I agree to the <a href="{{ route('privacypolicy') }}" target="_blank">Privacy Policy</a>
                   </label>
               </div>

               <div class="button">
                   <input type="hidden" name="delegate_type_id" value="{{ $selectedDelegateType->id }}">
                   <input type="submit" value="Register" />
               </div>
           </form>


           <div class="row">
               <div class="col-md-10">
                   <h2>FULL REGISTRATION INCLUDES</h2>
                   <ul>
                       <li>Access to all conference halls / Poster presentation area and exhibition halls.</li>
                       <li>Conference kit.</li>
                       <li>Lunch and Tea & snacks for 3 days.</li>
                       <li>Dinner 2 days: 1st day – Cultural Night and Dinner. 2nd day - Gala Dinner.</li>
                       <li>Special surprises. Can join as participant in all the events. (18 % GST will be applicable as per
                           GOI rules)</li>
                   </ul>

                   <table>
                       <tr>
                           <td>UG Students / Nurses</td>
                           <td>All facilities like Delegate. Except Gala dinner. (They may separately take passes on
                               chargeable basis).
                               All students to upload ID card / Letter from HOD as UG student.</td>
                       </tr>
                       <tr>
                           <td>PG / MSc / PhD</td>
                           <td>All facilities like Delegate.
                               All PG / MSc / PhD students to upload ID card / Letter from HOD / authority.
                           </td>
                       </tr>
                       <tr>
                           <td>Accompanying Person</td>
                           <td>All facilities like Delegate. Except Conference kit.</td>
                       </tr>
                   </table>

               </div>

           </div>

           <img src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">

           <script>
               $(function() {
                   const monthDay = "{{ $registrationDayMonth }}" + '/';

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

                   $('#togglePassword').click(function(event) {
                       event.preventDefault();

                       let passwordField = $('#password');
                       let type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                       passwordField.attr('type', type);

                       $(this).text(type === 'password' ? 'Show' : 'Hide');
                   });

                   $('.select-role').click(function () {
                        const roleId = $(this).data('value');
                        $('#registration_type').val(roleId);

                        $('html, body').animate({
                            scrollTop: $('#conference-register-form').offset().top - 20
                        }, 200);
                   });
               });
           </script>
       @stop
