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
                <input type="radio" id="early_bird" name="payment" checked value="{{$paymentSlabItem['early_bird_amount']}}">
                <label for="early_bird">{{$paymentSlabItem->currency}} {{$paymentSlabItem->early_bird_amount}}</label>
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
                <label for="early_bird">{{$paymentSlabItem['currency']}} {{$paymentSlabItem->standard_amount}}</label>
                @else
                Expired!
                @endif
            </td>
        </tr>

        <tr>
            <td>Spot Registration</td>
            <td>
                <input type="radio" id="spot" name="payment" value="{{$paymentSlabItem->spot_amount}}">
                <label for="spot">{{$paymentSlabItem['currency']}} {{$paymentSlabItem->spot_amount}}</label>
            </td>
        </tr>
    </tbody>
</table>

<h4>Accompanying person details</h4>
<p>
    Fees for each person is <u>{{$accompanyingPersonFees->currency}} {{$accompanyingPersonFees->early_bird_amount}}</u>
</p>

<table class="table">
    <tr>
        <td><input type="checkbox" name="person_1_check" id="person_1_check"></td>
        <td>
            <select name="person_1_title" id="person_1_title" class="form-control">
                <option value="">-- choose one --</option>
                @foreach (['Dr', 'Mr', 'Mrs', 'Ms'] as $title)
                <option value="{{$title}}">{{$title}}</option>
                @endforeach
            </select>
        </td>
        <td><input type="text" placeholder="Name" name="person_1_name" id="person_1_name" required></td>
        <td><input type="email" placeholder="Email" name="person_1_email" id="person_1_email"></td>
        <td>
            <input type="hidden" name="person_1_amount" value="{{$accompanyingPersonFees->early_bird_amount}}">
            <button class="btn btn-primary" id="person_1_confirm">Confirm</button>
        </td>
    </tr>
    <tr>
        <td><input type="checkbox" name="person_2_check" id="person_2_check"></td>
        <td>
            <select name="person_2_title" id="person_2_title" class="form-control">
                <option value="">-- choose one --</option>
                @foreach (['Dr', 'Mr', 'Mrs', 'Ms'] as $title)
                <option value="{{$title}}">{{$title}}</option>
                @endforeach
            </select>
        </td>
        <td><input type="text" placeholder="Name" name="person_2_name" id="person_2_name" required></td>
        <td><input type="email" placeholder="Email" name="person_2_email" id="person_2_email"></td>
        <td>
            <input type="hidden" name="person_2_amount" value="{{$accompanyingPersonFees->early_bird_amount}}">
            <button class="btn btn-primary" id="person_2_confirm">Confirm</button>
        </td>
    </tr>
</table>

<br>

<h2>
    Total: {{$paymentSlabItem->currency}} <span id="total-amount">0</span>
</h2>


<br/>
<br/>
<!-- Set up a container element for the button -->
<div id="paypal-button-container" style="width: 3rem;"></div>

<script>
    const token = "{{ csrf_token() }}";

    $(function () {
        console.log('Rready');

        $('#total-amount').text(document.querySelector('input[name="payment"]:checked')?.value ?? 0);
    });

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
