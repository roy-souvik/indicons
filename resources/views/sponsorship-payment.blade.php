@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

<div class="demo">
    <div class="container">
        <div class="row">

            @auth
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$sponsorship->title}}</h5>
                    <h6 class="card-subtitle mb-4 text-muted">
                        {{$sponsorship->currency}} {{number_format($sponsorship->amount)}}
                    </h6>

                    @if (!empty($sponsorship->features))
                    <ul>
                        @foreach ($sponsorship->features as $feature)
                        <li>{{$feature->title}}</li>
                        @endforeach
                    </ul>
                    @endif

                    @if ($isSponsorshipAvailable)
                    <div id="paypal-button-container"></div>
                    @else
                    <p>Sponsorship sold out!</p>
                    @endif
                </div>
            </div>
            @endauth

            @guest

            <div class="card p-4" style="width: 40rem;">
                <h1 class="display-6">Register to buy sponsorship</h1>
                <p class="text-secondary">Buy: <ins>{{$sponsorship->title}}</ins></p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-label for="name" :value="__('Name')" class="form-label"/>

                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" class="form-label"/>

                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" class="form-label"/>

                        <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label"/>

                        <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    </div>

                    <div>
                        <input type="hidden" name="role_id" value={{$role->id}}>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4 btn btn-primary">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>


                <p class="mt-4">Already Registered?</p>
                <a class="btn btn-link" href="/login">Login to continue</a>

            </div>

            @endguest

        </div>
    </div>
</div>

@auth
<script>
    const token = "{{ csrf_token() }}";

    $(function() {
        const ppButtonConfig = {
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            'value': "{{$sponsorship->amount}}"
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


    function saveSponsorshipPayment(data) {
        return $.ajax({
            url: '/sponsorship-payments',
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
