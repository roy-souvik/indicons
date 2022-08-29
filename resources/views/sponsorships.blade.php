@extends('layouts.indicons.main-layout')
@section('content')

@include('partials.sponsorship-styles')

<div class="reg-table">
    <div style="font-size: 24px!important; background:none!important;" class="title"> SPONSORSHIP </div>


    <div class="sponsor-list-bx">
        @include('partials.sponsorship-slab')
    </div>

    <button type="button" class="btn-reg-table" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-arrows-from-line"></i> Compact View </button>

</div>

<div>
    @guest
    <div class="row">
        <div class="col-md-6">
            <div>
                @foreach ($sponsorships as $sponsorship)

                @if ($sponsorship->category == 'main')
                <div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                    <img style="width: 43px;float: right;display: block;height: 43px;margin-top: 6px;margin-left: 15px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{$sponsorship->title}}">

                    <h3 class="title" style="color: black; font-size: 18px!important;">
                        {{$sponsorship->title}}
                        <span> {{$sponsorship->currency}} {{number_format($sponsorship->amount)}} </span>
                    </h3>

                    <button data-bs-toggle="modal" data-bs-target="#exampleModal-price" class="btn btn-link add-to-cart">Details</button>

                    <button style="background:#f32f30!important;" class="btn btn-link add-to-cart">Book Now</button>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-6">

            <h3 class="mt-4">Other Sponsorships</h3>

            <div class="sponsor-table">
                <table class="table">
                    <tr>
                        <th style="text-align:left;">Title</th>
                        <th>Amount</th>
                        <th>Number</th>
                        <th></th>
                    </tr>

                    @foreach ($sponsorships as $sponsorship)
                    @if ($sponsorship->category !== 'main')
                    <tr>
                        <td>{{$sponsorship->title}}</td>
                        <td style="text-align:center"><strong>{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</strong></td>
                        <td style="text-align:center">{{$sponsorship->number}}</td>
                        <td>
                            <button class="btn btn-link add-to-cart" data-id={{$sponsorship->id}}>Book Now</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endguest

    @include('partials.sponsorship-compact')

    <div id="exampleModal-price" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SPONSORSHIP
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pricingTable">
                        <div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                            <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
    margin-left: 24px;" class="rounded" src="https://indicons.in/indicons/images/platinum +.png" alt="platinum +">
                            <h3 class="title" style="color: black;">Platinum +</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">INR 1,000,000</span>
                        </div>

                        <ul class="pricing-content">
                            <li>Will be provided one large stall Inside the main hall</li>
                            <li>6 company executives will be given free Registration</li>
                            <li>One Dedicated lounge space will be provided for the company</li>
                            <li>Company logo will be given in conference website with link</li>
                            <li>Company logo will be given in all the fliers and newsletters</li>
                            <li>Company name and logo will be given in Preliminary and final program</li>
                            <li>In hall branding (electronic) will be provided</li>
                            <li>Company name will be announced adequately in announcements</li>
                            <li>Company logo will be given Separately in the Signage at entrance to the Main Hall and other halls</li>
                            <li>Head of sponsor at meeting will be acknowledge with special thanks.</li>
                            <li>Company logo will be given in Signage inside main conference hall</li>
                            <li>Electronic registration data of attendees will be given 2 weeks before the VAICON2023.</li>
                            <li>Electronic list of attendees (final) will be given 2 weeks after the VAICON2023. post conference</li>
                            <li>Company name will be mentioned adequately mention during the lectures and in program</li>
                            <li>Three dedicated scientific lectures will be in the name of the company</li>
                            <li>Allowed to offer special souvenir of VAICON 2023 with logo, to the attendees.</li>
                        </ul>

                        <div class="pricingTable-signup">
                            <button class="btn btn-primary add-to-cart" data-id="1">Book Now
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    @auth
    <a href="{{route('sponsorship.buy')}}" class="btn btn-primary pay-btn">Proceed to payment</a>
    @endauth

    <div class="demo">
        <div class="container">

            <div class="row">
                @auth
                @foreach ($sponsorships as $sponsorship)

                @if ($sponsorship->category == 'main')
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header d-flex" style="background-color: {{data_get($sponsorship, 'color', '#ffffff')}};">
                            <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
    margin-left: 55px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{strtolower($sponsorship->title)}}">
                            <h3 class="title" style="color: black;">{{$sponsorship->title}}</h3>
                        </div>
                        <div class="price-value">
                            <span class="amount">{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</span>
                        </div>

                        <ul class="pricing-content">
                            @foreach ($sponsorship->features as $feature)
                            <li>{{$feature->title}}</li>
                            @endforeach
                        </ul>

                        <div class="pricingTable-signup">
                            <button class="btn btn-primary add-to-cart" data-id="{{$sponsorship->id}}">Book Now</button>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

                <h3 class="mt-4">Other Sponsorships</h3>

                <div class="sponsor-table">
                    <table class="table">
                        <tr>
                            <th style="text-align:left;">Title</th>
                            <th>Amount</th>
                            <th>Number</th>
                            <th></th>
                        </tr>

                        @foreach ($sponsorships as $sponsorship)
                        @if ($sponsorship->category !== 'main')
                        <tr>
                            <td>{{$sponsorship->title}}</td>
                            <td style="text-align:center">{{$sponsorship->currency}}<strong> {{number_format($sponsorship->amount)}}</strong></td>
                            <td style="text-align:center">{{$sponsorship->number}}</td>
                            <td>
                                <button class="btn btn-link add-to-cart" data-id={{$sponsorship->id}}>Book Now</button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>

                @endauth
            </div>

            @guest
            <div class="log-box">
                <div class="row">
                    <div class="card p-4" style="width: 40rem;">
                        <h1 class="display-6"><strong>Register to buy sponsorship</strong></h1>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <label for="name" class="form-label">Authorized Person Name</label>

                                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" class="form-label" />

                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>

                            <div>
                                <label for="company" class="form-label">Company</label>

                                <input type="text" name="company" class="form-control" id="company" />
                            </div>

                            <div>
                                <label for="phone" class="form-label">Phone</label>

                                <input type="text" name="phone" class="form-control" id="phone" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" class="form-label" />

                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                            </div>

                            <div>
                                <input type="hidden" name="role_id" value={{$sponsorRole->id}}>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4 btn btn-primary">
                                    {{ __('Register') }}
                                </x-button>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <p class="mt-4">Already Registered?</p>
                                <a style="background: #f32f30!important;" class="btn btn-link" href="/login">Login to continue</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            @endguest
        </div>
    </div>

</div>

<script>
    $(function() {
        const token = "{{ csrf_token() }}";

        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            const sponsorshipId = $(this).attr('data-id');
            const payload = {
                '_token': token,
                'sponsorship_id': sponsorshipId,
            };

            saveUserSponsorship(payload);
        });

        $('.showbutton').on('click', function() {
            $(this).siblings('.showcase p').slideToggle();
            //this is for change text
            $(this).text(function(i, v) {
                return v === 'less' ? 'Read More' : 'less'
            });
        });

        function saveUserSponsorship(data) {
            return $.ajax({
                url: `/user-sponsorships/${data.sponsorship_id}`,
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                processData: false,
                success: function(result) {
                    if (result?.message) {
                        alert(result.message);
                    }

                    return result;

                },
                error: function(xhr, status, error) {
                    return error;
                },
            });
        }
    });
</script>

@stop
