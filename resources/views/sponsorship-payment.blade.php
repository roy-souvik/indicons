@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

@php
    $sponsorships = $userSponsorships->pluck('sponsorship');
@endphp

<div class="demo">
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <th style="text-align:left;">Title</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>

                @foreach ($sponsorships as $sponsorship)
                <tr>
                    <td>{{$sponsorship->title}}</td>
                    <td style="text-align:center">{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</td>
                    <td style="text-align:center">
                        <button class="btn btn-link remove-sponsorship" data-id="{{$sponsorship->id}}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div style="width: 10rem;" id="paypal-button-container"></div>
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
                            'value': "100"
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
