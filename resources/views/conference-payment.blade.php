@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<h4>Registration Fees in {{$paymentSlabItem['currency']}}</h4>

<table class="table">
    <tbody>
        <tr>
            <td>Early Bird Registration</td>
            <td>
                @if ($registrationTypeAuth['is_early_bird'])
                <input type="radio" id="early_bird" name="payment" checked value="{{$paymentSlabItem['early_bird_registration_fees']}}">
                <label for="early_bird">Pay {{$paymentSlabItem['early_bird_registration_fees']}}</label>
                @else
                Expired!
                @endif
            </td>
        </tr>

        <tr>
            <td>Standard Registration</td>
            <td>
                @if ($registrationTypeAuth['is_early_bird'])
                <input type="radio" id="standard" name="payment" value="{{$paymentSlabItem['standard_registration_fees']}}">
                <label for="early_bird">Pay {{$paymentSlabItem['standard_registration_fees']}}</label>
                @else
                Expired!
                @endif
            </td>
        </tr>

        <tr>
            <td>Spot Registration</td>
            <td>
                <input type="radio" id="spot" name="payment" value="{{$paymentSlabItem['spot_registration_fees']}}">
                <label for="spot">Pay {{$paymentSlabItem['spot_registration_fees']}}</label>
            </td>
        </tr>
    </tbody>
</table>

<!-- Set up a container element for the button -->
<div id="paypal-button-container" style="width: 3rem;"></div>

<script>
    const token = "{{ csrf_token() }}";

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
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        'value': document.querySelector('input[name="payment"]:checked')?.value ?? 0
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

                saveConferencePayment(responseData).then(() => {
                    location.href = '/payment-success?transaction_id=' + transaction.id;
                });
            });
        },
    }).render('#paypal-button-container');
</script>
@stop
