@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

<div class="demo">
    <div class="container">
        <div class="row">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$sponsorship->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        {{$sponsorship->currency}} {{number_format($sponsorship->amount)}}
                    </h6>

                    <div id="paypal-button-container"></div>
                </div>
            </div>

        </div>
    </div>
</div>

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
                            'payer_amount': '10',
                        };

                        saveConferencePayment(responseData).then(() => {
                            location.href = '/payment-success?transaction_id=' + transaction.id;
                        });
                    });
                },
            };

            paypal.Buttons(ppButtonConfig).render('#paypal-button-container');
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
    </script>

@stop
