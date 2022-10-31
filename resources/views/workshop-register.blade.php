@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

@php
function addGst($amount, $gstPercent = 18) {
    return $amount + (($amount*$gstPercent)/100);
}

$totalWorkshopPrice = addGst($workshopPrice->value);

@endphp

<div class="container">

    <h4>Register for workshop</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @guest
    <div class="row">
        <div class="card p-4" style="width: 40rem;">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="form-label">Name</label>

                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" class="form-label" />

                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4 mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" placeholder="Choose image" id="image">
                </div>

                <!-- <div>
                    <label for="company" class="form-label">Company</label>

                    <input type="text" name="company" value="{{ old('company') }}" class="form-control" id="company" />
                </div> -->

                <div>
                    <label for="phone" class="form-label">Phone</label>

                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" />
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
                    <input type="hidden" name="role_id" value={{$workshopAttendeeRole->id}}>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4 btn btn-primary">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    @endguest

    @if(Auth::user())
    <div class="row">
        <div class="card p-4" style="width: 40rem;">
            <h4>Workshop Details</h4>

            <ul>
                @foreach ($workshops as $workshop)
                <li>{{$workshop->name}}</li>
                @endforeach
            </ul>

            <p>
                Price: INR {{$totalWorkshopPrice}}
                <em class="text-muted" style="font-size: 0.8rem;">18% tax included</em>
            </p>
            <div style="width: 10rem;" id="paypal-button-container"></div>
        </div>
    </div>
    @endif

    @auth
    <script>
        const token = "{{ csrf_token() }}";

        $(function() {
            const ppButtonConfig = {
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                'value': {{$totalWorkshopPrice}}
                            }
                        }]
                    });
                },

                // Finalize the transaction
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        const transaction = orderData.purchase_units[0].payments.captures[0];

                        const responseData = {
                            '_token': token,
                            'transaction_id': transaction.id,
                            'status': transaction.status,
                            'amount': transaction.amount.value,
                            'payment_response': orderData,
                        };

                        saveSponsorshipPayment(responseData).then(() => {
                            location.href = '/payment-success?transaction_id=' + transaction.id;
                        });
                    });
                },
            };

            paypal.Buttons(ppButtonConfig).render('#paypal-button-container');
        });

        function saveWorkshopPayment(data) {
            return $.ajax({
                url: '/workshop-payments',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                processData: false,
                success: function(result) {
                    return result;
                },
                error: function(xhr, status, error) {
                    return error;
                },
            });
        }
    </script>
    @endauth

    @stop
