@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency={{$paymentSlabItem->currency}}"></script>

<h4>Registration Fees in {{$paymentSlabItem['currency']}}</h4>

<table class="table">
    <tbody>
        <tr>
            <td>Early Bird Registration</td>
            <td>
                @if ($registrationTypeAuth['is_early_bird'])
                <input type="radio" id="early_bird" name="payment" checked value="{{$paymentSlabItem['early_bird_amount']}}">
                <label for="early_bird">{{$paymentSlabItem->currency}} {{intval($paymentSlabItem->early_bird_amount) - $discounts['early_bird']}}</label>
                @else
                Expired!
                @endif
            </td>
        </tr>

        <tr>
            <td>Standard Registration</td>
            <td>
                @if ($registrationTypeAuth['is_early_bird'])
                <input type="radio" id="standard" name="payment" value="{{$paymentSlabItem->standard_amount}}">
                <label for="standard">{{$paymentSlabItem['currency']}} {{intval($paymentSlabItem->standard_amount) - $discounts['standard']}}</label>
                @else
                Expired!
                @endif
            </td>
        </tr>

        <tr>
            <td>Spot Registration</td>
            <td>
                <input type="radio" id="spot" name="payment" value="{{$paymentSlabItem->spot_amount}}">
                <label for="spot">{{$paymentSlabItem['currency']}} {{intval($paymentSlabItem->spot_amount) - $discounts['spot']}}</label>
            </td>
        </tr>
    </tbody>
</table>

@if ($accompanyingPersons->count() < 2) <br>
    <h5>Enter accompanying person details</h5>
    @php
    $amt = intval($accompanyingPersonFees->early_bird_amount);

    $companionAmount = $paymentSlabItem->currency != $accompanyingPersonFees->currency
    ? intval($amt / 75)
    : $amt;
    @endphp
    <p>
        Fees for each person is
        <u>{{$paymentSlabItem->currency}} {{$companionAmount}}</u>
    </p>

    @php
    $numbers = $accompanyingPersons->count() == 0 ? [1, 2] : [2];
    @endphp

    <table class="table">
        @foreach ($numbers as $number)
        <tr id="person_{{$number}}_row">
            <td>
                <select name="person_{{$number}}_title" id="person_{{$number}}_title" class="form-control">
                    <option value="">-- choose one --</option>
                    @foreach (['Dr', 'Mr', 'Mrs', 'Ms'] as $title)
                    <option value="{{$title}}">{{$title}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="text" placeholder="Name" class="form-control" name="person_{{$number}}_name" id="person_{{$number}}_name">
            </td>
            <td>
                <input type="email" placeholder="Email (optional)" class="form-control" name="person_{{$number}}_email" id="person_{{$number}}_email">
            </td>
            <td>
                <input type="hidden" name="person_{{$number}}_fees" id="person_{{$number}}_fees" value="{{$companionAmount}}">
                <button class="btn btn-primary" id="person_{{$number}}_confirm">Confirm</button>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    @if ($accompanyingPersons->count() > 0)
    <br>
    <h5>Accompanying persons</h5>
    <table class="table" id="accompanying-persons-list">
        <tr>
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach($accompanyingPersons as $key => $person)
        <tr>
            <td>{{$person->name}}</td>
            <td>{{$person->email ?? 'N/A'}}</td>
            <td>
                <input type="hidden" id="person_{{$key + 1}}_fees_payable" value="{{$person->fees}}">
                <button class="btn btn-light delete-person" data-id="{{$person->id}}">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    <br>

    <div class="d-flex" style="flex-direction: column;">
        <label for="pickup_drop_check">
            <input type="hidden" name="pick_drop_price" value="{{$pickupDropPrice->value}}">
            <input name="pickup_drop_check" id="pickup_drop_check" type="checkbox">
            I need pickup and drop facility at INR {{$pickupDropPrice->value}}.
        </label>

        <label for="airplane_booking_check">
            <input name="airplane_booking_check" id="airplane_booking_check" type="checkbox">
            I want to avail airplane tickets booking. (<em class="text-muted" style="font-size: 0.8rem;">Our team will contact you for furthur details.</em>)
        </label>
    </div>

    <br>

    <div class="d-flex">
        <h2>Total: {{$paymentSlabItem->currency}} <span id="total-amount">0</span></h2>

        <button class="btn btn-primary ms-5" id="proceed-payment">Proceed to payment</button>
    </div>

    <br />
    <br />
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" style="width: 3rem; margin-bottom: 10rem;"></div>

    <script>
        const token = "{{ csrf_token() }}";

        $(function() {
            updateAmount();

            $('input[name="pickup_drop_check"]').change(function () {
                updateAmount();
            });

            var ppButtonConfig = {
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                'value': updateAmount().total_amount
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
                            'payer_amount': updateAmount().payer_amount,
                            'member_registration_type': $('input[name="payment"]:checked').attr('id'),
                            'pickup_drop': $('input[name="pickup_drop_check"]:checked').val() ? true : false,
                            'airplane_booking': $('input[name="airplane_booking_check"]:checked').val() ? true : false,
                        };

                        saveConferencePayment(responseData).then(() => {
                            location.href = '/payment-success?transaction_id=' + transaction.id;
                        });
                    });
                },
            };

            $('input[name="payment"]').change(function() {
                updateAmount();
            });

            $('#person_1_confirm').click(function() {
                var title = $('#person_1_title').val();
                var name = $('#person_1_name').val();
                var email = $('#person_1_email').val();
                var fees = $('#person_1_fees').val();

                createAccompanyingPerson({
                    '_token': token,
                    title,
                    name,
                    email,
                    fees,
                }).then(function() {
                    $('#person_1_fees_payable').val(fees);
                    updateAmount();

                    location.reload();
                });
            });

            $('#person_2_confirm').click(function() {
                var title = $('#person_2_title').val();
                var name = $('#person_2_name').val();
                var email = $('#person_2_email').val();
                var fees = $('#person_2_fees').val();

                createAccompanyingPerson({
                    '_token': token,
                    title,
                    name,
                    email,
                    fees,
                }).then(function() {
                    $('#person_2_fees_payable').val(fees);
                    updateAmount();
                    location.reload();
                });
            });

            $('.delete-person').click(function() {
                var id = $(this).attr('data-id');

                deleteAccompanyingPerson(id);
            });

            $('#proceed-payment').click(function() {
                $('#paypal-button-container').html('');
                paypal.Buttons(ppButtonConfig).render('#paypal-button-container');
            });
        });

        function updateAmount() {
            const payerAmount = parseInt(document.querySelector('input[name="payment"]:checked')?.value ?? 0, 10);
            const person1Amount = $('#person_1_fees_payable').val() ?? 0;
            const person2Amount = $('#person_2_fees_payable').val() ?? 0;
            const pickUpDropPrice = $('input[name="pickup_drop_check"]:checked').val()
                ? parseInt($('input[name="pick_drop_price"]').val())
                : 0;

            const totalAmount = payerAmount + parseInt(person1Amount, 10) + parseInt(person2Amount, 10) + pickUpDropPrice;

            $('#total-amount').text(totalAmount);

            return {
                total_amount: totalAmount,
                payer_amount: payerAmount,
            };
        }

        function createAccompanyingPerson(data) {
            return $.ajax({
                url: '/accompanying-persons',
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

        function deleteAccompanyingPerson(id) {
            return $.ajax({
                url: `/accompanying-persons/${id}`,
                type: 'DELETE',
                data: JSON.stringify({
                    '_token': token,
                }),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                processData: false,
                success: function(result) {
                    location.reload();
                    return result;
                },
                error: function(xhr, status, error) {
                    return error;
                },
            });
        }

        function saveConferencePayment(data) {
            return $.ajax({
                url: '/save-payment',
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
    @stop
