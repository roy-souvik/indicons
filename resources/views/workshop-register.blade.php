@extends('layouts.indicons.main-layout')
@section('content')
    @php
        use Carbon\Carbon;

        // Group workshops by date
        $grouped = $workshops->groupBy(function ($workshop) {
            return $workshop->start_date->format('Y-m-d');
        });

        $unitWorkshopPrice = !empty($registrationCharge) ? $registrationCharge->amount : 0;
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
            <div class="d-flex align-items-center">
                <!-- Left side: Delegate type buttons -->
                <div class="col-md-7 mb-4">
                    <table class="table table-bordered text-center">
                        <tr>
                            @foreach ($delegateTypes as $type)
                                <td>
                                    <a class="btn w-100 {{ $selectedDelegateType->name === $type->name ? 'btn-primary' : 'btn-outline-primary' }}"
                                        href="{{ route('workshop.register.show', ['type' => $type->name]) }}">
                                        {{ $type->description }}
                                    </a>
                                </td>
                            @endforeach
                        </tr>
                    </table>
                </div>

                <!-- Right side: Fee Structure -->
                <div class="col-md-5">
                    <div class="border rounded p-3 bg-light">
                        <p class="fw-bold">Fee Structure: (website workshop segment)</p>
                        <p>Fee for each workshop.</p>
                        <p>Full registration (free entry for all the workshops)</p>

                        <table class="table table-sm table-striped">
                            <tbody>
                                @foreach ($registrationCharges as $regCh)
                                    <tr>
                                        <td>{{ strtoupper($regCh->delegateType->name) }}</td>
                                        <td>{{ $regCh->amount }} {{ $regCh->currency }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endguest

        {{--  --}}

        @foreach ($grouped as $date => $dayWorkshops)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Date: {{ Carbon::parse($date)->format('d.m.Y') }}</strong><br>
                    <span>Venue: <u>{{ $dayWorkshops->first()->venue ?? 'TBD' }}</u></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($dayWorkshops as $index => $workshop)
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    @auth
                                        <input class="form-check-input workshop-checkbox" type="checkbox"
                                            value="{{ $workshop->name }}" id="workshop{{ $workshop->id }}"
                                            data-id="{{ $workshop->id }}" data-name="{{ $workshop->name }}"
                                            data-amount="{{ $unitWorkshopPrice }}">
                                    @endauth
                                    <label class="form-check-label fw-bold" for="workshop{{ $workshop->id }}">
                                        {{ $workshop->name }}
                                    </label>
                                </div>
                                {!! $workshop->description !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        {{--  --}}

        @guest
            <div class="row">
                <div class="card p-4" style="width: 40rem; min-height: 20rem;">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="name" class="form-label">Name</label>

                            <x-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                                required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" class="form-label" />

                            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                required />
                        </div>

                        <div>
                            <label for="phone" class="form-label">Phone</label>

                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                                id="phone" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" class="form-label" />

                            <x-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

                            <x-input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required />
                        </div>

                        <div>
                            <input type="hidden" name="role_id" value={{ $workshopAttendeeRole->id }}>
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

        @if (Auth::user())
            <div class="row">
                <div class="card p-4" style="width: 40rem;">
                    <h4>Workshop Selected</h4>

                    <ul id="selected-workshop-list">

                    </ul>

                    <p>
                        Price:
                        <span id="currency-symbol">
                            {{ currencySymbol($registrationCharge->currency) }}
                        </span>
                        <span id="selected-total-fee">0</span>
                    </p>

                    <button id="proceed-payment" class="btn btn-primary ms-5" style="width: 14rem;">
                        Proceed To Payment
                    </button>

                    <button id="rzp-button1" class="btn btn-primary d-none" style="width: 10rem;">
                        Pay <span id="button-currency-symbol">{{ currencySymbol($registrationCharge->currency) }}</span>
                        <span id="final-amount">0</span>
                    </button>
                </div>
            </div>
        @endif

        @auth
            <script>
                const token = "{{ csrf_token() }}";
                const unitWorkshopPrice = {{ $unitWorkshopPrice }};
                const $finalAmount = $('#final-amount');

                const selectedWorkshops = [];

                function updateWorkshopList() {
                    const $list = $('#selected-workshop-list');
                    const $fee = $('#selected-total-fee');
                    $list.empty();

                    let total = 0;

                    selectedWorkshops.forEach(item => {
                        $list.append(`<li>${item.name}</li>`);
                        total += parseInt(item.amount);
                    });

                    total = addGst(total);

                    $fee.text(total);
                    $finalAmount.text(total);
                }

                function addWorkshop(workshop) {
                    if (!selectedWorkshops.find(item => item.id === workshop.id)) {
                        selectedWorkshops.push(workshop);
                    }
                    updateWorkshopList();
                }

                function removeWorkshop(workshopId) {
                    const index = selectedWorkshops.findIndex(item => item.id === workshopId);
                    if (index > -1) {
                        selectedWorkshops.splice(index, 1);
                    }
                    updateWorkshopList();
                }

                function addGst(amount, gstPercent = 18) {
                    return amount + ((amount * gstPercent) / 100);
                }

                function getTotalWorkshopFee() {
                    const selectedCount = $('.workshop-checkbox:checked').length;

                    return selectedCount * parseInt(unitWorkshopPrice, 10);
                }

                $(function() {
                    $('.workshop-checkbox').on('change', function() {
                        const $checkbox = $(this);
                        const workshop = {
                            id: parseInt($checkbox.data('id')),
                            name: $checkbox.data('name'),
                            amount: parseInt($checkbox.data('amount'))
                        };

                        if ($checkbox.is(':checked')) {
                            addWorkshop(workshop);
                        } else {
                            removeWorkshop(workshop.id);
                        }
                    });

                    $('#proceed-payment').click(function() {
                        const amount = addGst(getTotalWorkshopFee());

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
                                'currency': "{{ $registrationCharge->currency }}",
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
                            "key": "{{ $razorPayKey }}",
                            "amount": "{{ $unitWorkshopPrice }}",
                            'currency': "{{ $registrationCharge->currency }}",
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
                                    'currency': "{{ $registrationCharge->currency }}",
                                    'payment_response': {
                                        'checkout_response': response,
                                        'order_response': orderData,
                                    },
                                    'payment_title': 'workshop_register_payment',
                                    'workshop_ids': selectedWorkshops.map(workshop => workshop.id),
                                };

                                saveWorkshopPayment(responseData).then(() => {
                                    location.href = '/payment-success?transaction_id=' + response
                                        .razorpay_payment_id;
                                }, (xhr) => {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: xhr?.responseJSON?.message ||
                                            'Error while verifying your payment.',
                                        icon: 'error',
                                    });
                                });
                            },
                            "prefill": {
                                "name": "{{ $user->getDisplayName() }}",
                                "email": "{{ $user->email }}",
                                "contact": "{{ $user->phone }}"
                            },
                            "notes": {
                                "address": "{{ config('site.app_title') }} conference payment"
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
                            return error;
                        },
                    });
                }
            </script>
        @endauth

    @stop
