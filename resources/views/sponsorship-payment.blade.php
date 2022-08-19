@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

@php
function addGst($amount, $gstPercent = 18) {
    return $amount + (($amount*$gstPercent)/100);
}

$sponsorships = $userSponsorships->pluck('sponsorship');

$totalAmount = 0;
@endphp

<div class="demo">
    <div class="container">
        <div class="row">
            @if ($sponsorships?->count() > 0)
            <table class="table">
                <tr>
                    <th style="text-align:left;">Title</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>

                @foreach ($sponsorships as $sponsorship)

                @php
                    $totalAmount+= intval($sponsorship->amount)
                @endphp
                <tr>
                    <td>{{$sponsorship->title}}</td>
                    <td style="text-align:center">{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</td>
                    <td style="text-align:center">
                        <form method="POST" action="{{ route('sponsorships.delete', $sponsorship->id)}}">
                        @csrf
                            <button class="btn btn-link remove-sponsorship" data-id="{{$sponsorship->id}}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <a class="text-center" href="{{route('sponsorship.show')}}">Add More</a>

            @php
            $totalAmount = addGst($totalAmount);
            @endphp

            <h3>Total Amount: INR {{number_format($totalAmount)}}
                <em class="text-muted" style="font-size: 0.8rem;">18% tax included</em>
            </h3>

            <div style="width: 10rem;" id="paypal-button-container"></div>
            @endif

            @if ($sponsorships?->count() == 0)
                <h3 class="text-center">No Data</h3>
                <a class="text-center" href="{{route('sponsorship.show')}}">Sponsorships</a>
            @endif
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
                            'value': {{$totalAmount}}
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
