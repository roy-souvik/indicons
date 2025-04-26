@extends('layouts.indicons.main-layout')
@section('content')

@php
$totalWorkshopPrice = !empty($registrationCharge)
    ? $registrationCharge->amount
    : 0;
@endphp

<div class="container">

    <div class="d-flex align-items-center">
        <h4>Register for workshop</h4>
        <span class="text-muted ms-1">(All fields are required)</span>
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

    @guest
    <div class="d-flex">
        <ul class="nav nav-pills nav-fill">
            @foreach ($delegateTypes as $type)
                <li class="nav-item">
                    <a class="nav-link {{ $selectedDelegateType->name === $type->name ? 'active' : '' }}"
                        aria-current="page"
                        href="{{ route('workshop.register.show', [
                            'type' => $type->name,
                        ]) }}">
                        {{ $type->description }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="row">
        <div class="card p-4" style="width: 40rem; min-height: 20rem;">
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
                    <input type="hidden" name="delegate_type_id" value="{{ $selectedDelegateType->id }}">
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
                @php
                    $firstWorkshopId = $workshops->first()->id;
                @endphp
                @foreach ($workshops as $workshop)
                <li>{{$workshop->name}}</li>
                @endforeach
            </ul>

            <p>Price: <span id="currency-symbol">{{currencySymbol($registrationCharge->currency)}}</span>{{$totalWorkshopPrice}}</p>

            <button id="proceed-payment" class="btn btn-primary ms-5" style="width: 14rem;">Proceed To Payment</button>

            <button id="rzp-button1" class="btn btn-primary d-none" style="width: 10rem;">
                Pay, <span id="button-currency-symbol">{{currencySymbol($registrationCharge->currency)}}</span> {{$totalWorkshopPrice}}
            </button>
        </div>
    </div>

    @endif

    @auth
    <script>
        const token = "{{ csrf_token() }}";

        function addGst(amount, gstPercent = 18) {
            return amount + ((amount * gstPercent) / 100);
        }

        $(function() {
            $('#proceed-payment').click(function() {
                const amount = "{{$totalWorkshopPrice}}";

                createOrder(amount).then(function(response) {
                    $('#proceed-payment').addClass('d-none');
                    $('#rzp-button1').removeClass('d-none');

                    buildCheckoutLink(response.data);
                }, function() {
                    console.log('Some error');
                });
            });

            function createOrder(totalAmount) {
                return $.ajax({
                    url: '/create-orders',
                    type: 'POST',
                    data: JSON.stringify({
                        '_token': token,
                        'amount': totalAmount,
                        'currency': "{{$registrationCharge->currency}}",,
                    }),
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    processData: false,
                    beforeSend: function() {
                        showLoader();
                    },
                    complete: function() {
                        hideLoader();
                    },
                    success: function(result) {
                        return result;
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: xhr?.responseJSON?.message || 'Error',
                            icon: 'error',
                        });

                        return error;
                    },
                });
            }

            function buildCheckoutLink(orderData) {
                var options = {
                    "key": "{{$razorPayKey}}",
                    "amount": "{{$totalWorkshopPrice}}",
                    'currency': "{{$registrationCharge->currency}}",
                    "name": "Inpalms 2025, Workshop Payment",
                    "description": "Inpalms 2025 conference workshop payment",
                    "image": "https://www.inpalms2025.com/indicons/images/logo.png",
                    "order_id": orderData.id,
                    "handler": function(response) {
                        const responseData = {
                            '_token': token,
                            'transaction_id': response.razorpay_payment_id,
                            'status': orderData.status,
                            'amount': orderData.amount,
                            'payment_response': {
                                'checkout_response': response,
                                'order_response': orderData,
                            },
                            'payment_title': 'workshop_register_payment',
                            'workshop_id': "{{$firstWorkshopId}}"
                        };

                        saveWorkshopPayment(responseData).then(() => {
                            location.href = '/payment-success?transaction_id=' + response.razorpay_payment_id;
                        }, (xhr) => {
                            Swal.fire({
                                title: 'Error!',
                                text: xhr?.responseJSON?.message || 'Error while verifying your payment.',
                                icon: 'error',
                            });
                        });
                    },
                    "prefill": {
                        "name": "{{$user->getDisplayName()}}",
                        "email": "{{$user->email}}",
                        "contact": "{{$user->phone}}"
                    },
                    "notes": {
                        "address": "{{config('site.app_title')}} conference payment"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };

                const razorPay = new Razorpay(options);

                razorPay.on('payment.failed', function(response) {
                    console.log(response.error.code);
                    console.log(response.error.description);
                    console.log(response.error.source);
                    console.log(response.error.step);
                    console.log(response.error.reason);
                    console.log(response.error.metadata.order_id);
                    console.log(response.error.metadata.payment_id);

                    Swal.fire({
                        title: `Error! ${response.error.code}`,
                        text: `Description: ${response.error.description} | Order ID: ${response.error.metadata.order_id}`,
                        icon: 'error',
                    });
                });

                document.getElementById('rzp-button1').onclick = function(e) {
                    razorPay.open();
                    e.preventDefault();
                }
            }

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
