@extends('layouts.indicons.main-layout')
@section('content')

@include('partials.sponsorship-styles')

<div class="reg-table">
    <div style="font-size: 24px!important; background:none!important;" class="title">SPONSORSHIP</div>

    <div class="sponsor-list-bx">
        @include('partials.sponsorship-slab')
    </div>

    <button type="button" class="btn-reg-table" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-arrows-from-line"></i> Compact View
    </button>
</div>

<div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="mt-4">Sponsorships</h3>
            <div>
                @foreach ($sponsorships as $sponsorship)

                @if ($sponsorship->category == 'main')
                <div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                    <img style="width: 43px;float: right;display: block;height: 43px;margin-top: 6px;margin-left: 15px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{$sponsorship->title}}">

                    <h3 class="title" style="color: black; font-size: 18px!important;">
                        {{$sponsorship->title}}
                        <span> {{$sponsorship->currency}} {{number_format($sponsorship->amount)}} </span>
                    </h3>

                    <button data-bs-toggle="modal" data-bs-target="#sponsorship-details-{{$sponsorship->id}}" class="btn btn-link add-to-cart">Details</button>

                    @auth
                    <button style="background:#f32f30!important;" data-id={{$sponsorship->id}} class="btn btn-link add-to-cart">
                        Book Now
                    </button>
                    @endAuth

                    @guest
                    <a class="btn btn-primary" href="{{route('login')}}">Login to book</a>
                    @endguest
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
                            @auth
                            <button class="btn btn-link add-to-cart" data-id={{$sponsorship->id}}>Book Now</button>
                            @endauth

                            @guest
                            <a class="btn btn-primary" href="{{route('login')}}">Login to book</a>
                            @endguest
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('partials.sponsorship-compact')

    @foreach ($sponsorships as $sponsorship)
    @if ($sponsorship->category == 'main')
    <div id="sponsorship-details-{{$sponsorship->id}}" class="modal">
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
                            <img style="width: 43px;float: right;display: block;height: 43px;margin-top: 6px;margin-left: 24px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{strtolower($sponsorship->title)}}">
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
                            @auth
                            <button class="btn btn-primary add-to-cart" data-id="{{$sponsorship->id}}">
                                Book Now
                            </button>
                            @endauth

                            @guest
                            <a class="btn btn-primary" href="{{route('login')}}">Login to book</a>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach

    @auth
    <a href="{{route('sponsorship.buy')}}" class="btn btn-primary pay-btn">Proceed to payment</a>
    @endauth

    @guest
    <div class="demo">
        <div class="container">
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
        </div>
    </div>
    @endguest
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
                    getSponsorshipCart();
                    if (result?.message) {
                        getSponsorshipCart().then(result => {
                            const markup = getCartMarkup(result.data);

                            Swal.fire({
                                title: 'Success!',
                                html: markup,
                                text: result.message,
                                icon: 'success',
                            });
                        });
                    }

                    return result;
                },
                error: function(xhr, status, error) {
                    return error;
                    Swal.fire({
                        title: 'Error!',
                        text: 'Unable to save sponsorship',
                        icon: 'error',
                    });
                },
            });
        }

        function getCartMarkup(userSponsorships = []) {
            let markup = '<ul class="list-group">';

            userSponsorships.forEach(userSponsorship => {
                markup += `<li class="list-group-item">${userSponsorship.sponsorship.title}</li>`;
            });

            markup += '</ul>';

            return markup;
        }

        function getSponsorshipCart() {
            return $.ajax({
                url: '/sponsorships-cart',
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function(result) {
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
