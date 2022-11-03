@extends('layouts.indicons.main-layout')
@section('content')

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

@if (!$user->role->isStudent()) <br>
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
    <input type="hidden" name="companion-amount" id="companion-amount" value="{{$companionAmount}}">
</p>

<table class="table" id="accompanying-person-table">

</table>

<!-- <div>
    <button class="btn btn-primary d-flex" id="accompanying-person-btn-add" data-nextid="2">
        Add accoompanying person
    </button>
</div> -->
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
            <input type="hidden" class="person-fees" id="person_{{$key + 1}}_fees_payable" value="{{$person->fees}}">
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
    <h2>
        Total: {{$paymentSlabItem->currency}} <span id="total-amount">0</span>
        <!-- <em class="text-muted" style="font-size: 0.8rem;">18% tax included</em> -->
    </h2>

    <button id="proceed-payment" class="btn btn-primary">Proceed Payment</button>

    <button id="rzp-button1" class="btn btn-primary ms-5 d-none">Pay</button>
</div>

<script>
    const token = "{{ csrf_token() }}";

    $(function() {
        updateAmount();
        addCompanion(1);

        $('input[name="pickup_drop_check"]').change(function() {
            updateAmount();
        });

        $('input[name="payment"]').change(function() {
            updateAmount();
        });

        $('#accompanying-person-btn-add').click(function() {
            const nextId = $(this).attr('data-nextid');
            addCompanion(nextId);
        });

        $('#proceed-payment').click(function() {
            const amount = updateAmount().total_amount;

            createOrder(amount).then(function(response) {
                console.log('response: ', response);

                $('#proceed-payment').addClass('d-none');
                $('#rzp-button1').removeClass('d-none');

                buildCheckoutLink(response.data.id);
            }, function() {
                console.log('Some error');
            });
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

                Swal.fire({
                    title: 'Success!',
                    text: 'Accompanying person added.',
                    icon: 'success',
                }).then(function() {
                    location.reload();
                });
            });
        });

        $('.delete-person').click(function() {
            var id = $(this).attr('data-id');

            deleteAccompanyingPerson(id);
        });
    });

    function updateAmount() {
        const payerAmount = parseInt(document.querySelector('input[name="payment"]:checked')?.value ?? 0, 10);
        const companionsAmount = getCompanionsTotalAmount();
        const pickUpDropPrice = $('input[name="pickup_drop_check"]:checked').val() ?
            parseInt($('input[name="pick_drop_price"]').val()) :
            0;

        let totalAmount = payerAmount + companionsAmount + pickUpDropPrice;

        // Remove GST for now
        // totalAmount = addGst(totalAmount);

        $('#total-amount').text(totalAmount);

        return {
            total_amount: totalAmount,
            payer_amount: payerAmount,
        };
    }

    function getCompanionsTotalAmount() {
        let amount = 0;

        $('.person-fees').each(function() {
            amount = amount + parseInt($(this).val(), 10);
        });

        return amount;
    }

    function createOrder(totalAmount) {
        return $.ajax({
            url: '/create-orders',
            type: 'POST',
            data: JSON.stringify({
                '_token': token,
                'amount': totalAmount,
                'currency': 'INR',
            }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            processData: false,
            beforeSend: function() {
                console.log('Show loader');
            },
            complete: function() {
                console.log('Hide loader');
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
            "amount": updateAmount().total_amount * 100,
            "currency": "INR",
            "name": "Acme Corp",
            "description": "Test Transaction",
            "image": "https://www.vaicon2023.com/indicons/images/logo.png",
            "order_id": orderData.id,
            "handler": function(response) {
                console.log('Paid: ', response);
                console.log(response.razorpay_payment_id);
                console.log(response.razorpay_order_id);
                console.log(response.razorpay_signature);

                const transaction = orderData.purchase_units[0].payments.captures[0];

                const responseData = {
                    '_token': token,
                    'transaction_id': transaction.id,
                    'status': transaction.status,
                    'amount': transaction.amount.value,
                    'payment_response': response,
                    'payer_amount': updateAmount().payer_amount,
                    'member_registration_type': $('input[name="payment"]:checked').attr('id'),
                    'pickup_drop': $('input[name="pickup_drop_check"]:checked').val() ? true : false,
                    'airplane_booking': $('input[name="airplane_booking_check"]:checked').val() ? true : false,
                    'payment_title': 'conference_payment',
                };

                saveConferencePayment(responseData).then(() => {
                    location.href = '/payment-success?transaction_id=' + response.razorpay_payment_id;
                });
            },
            "prefill": {
                "name": "Gaurav Kumar",
                "email": "gaurav.kumar@example.com",
                "contact": "9999999999"
            },
            "notes": {
                "address": "Vaicon 2023 conference payment"
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
        });

        document.getElementById('rzp-button1').onclick = function(e) {
            razorPay.open();
            e.preventDefault();
        }
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
                Swal.fire({
                    title: 'Error!',
                    text: xhr?.responseJSON?.message || 'Error',
                    icon: 'error',
                });

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

    function addGst(amount, gstPercent = 18) {
        return amount + ((amount * gstPercent) / 100);
    }

    function addCompanion(number) {
        const companionAmount = $('#companion-amount').val();
        const markup = `
            <tr id="person_${number}_row">
                <td>
                    <select name="person_${number}_title" id="person_${number}_title" class="form-control">
                        <option value="">-- choose one --</option>
                        <option value="Dr">Dr</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                    </select>
                </td>
                <td>
                    <input type="text" placeholder="Name" class="form-control" name="person_${number}_name" id="person_${number}_name">
                </td>
                <td>
                    <input type="email" placeholder="Email (optional)" class="form-control" name="person_${number}_email" id="person_${number}_email">
                </td>
                <td>
                    <input type="hidden" name="person_${number}_fees" id="person_${number}_fees" value="${companionAmount}">
                    <button class="btn btn-primary" id="person_${number}_confirm">Confirm</button>
                </td>
            </tr>
        `;

        $('#accompanying-person-table').append(markup);
    }
</script>
@stop
