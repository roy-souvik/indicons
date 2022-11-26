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

<hr />

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

<hr>
@endif

<div class="container" style="margin: 2rem 0 2rem 0;">
    <div class="row">

        <div class="col-8">
            <h4>Accommodation</h4>
            @foreach($hotels as $hotel)
            <p style="margin-bottom: 0rem;">{{$hotel->name}}</p>
            <em style="font-size: 0.8rem;">{{$hotel->address}}</em>

            <table class="table mt-3">
                <tbody>
                    @foreach($hotel->rooms as $room)
                    <tr>
                        <!-- <td><input type="checkbox" name="room" data-roomid="{{$room->id}}" data-amount="{{$room->amount}}"></td> -->
                        <td>{{$room->room_category}}</td>
                        <td style="text-align: right;">
                            Rooms:
                            <input type="number" name="room-count" value="0" id="room-{{$room->id}}" data-roomid="{{$room->id}}" min="0" max="2" data-amount="{{$room->amount}}" style="width: 4rem;" />
                            <span>X</span>
                        </td>
                        <td>{{$room->currency}} {{$room->amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
        </div>

        <div class="col">
            <h4>Booking Dates</h4>
            <div id="booking-days" style="width: 15rem;">
                <ul class="list-group list-group-flush">
                    @foreach ($bookingPeriod as $bookingDate)
                    @php
                        $isCheckedDate = in_array($loop->index, [1, 2])
                    @endphp
                    <li class="list-group-item">
                        <input
                            name="bookingDate"
                            class="booking-date"
                            type="checkbox"
                            data-date="{{$bookingDate->format('Y-m-d')}}"
                            id="booking_date_{{$bookingDate->format('d_m_Y')}}"
                            {{$isCheckedDate ? 'checked' : ''}}
                            />
                        <label class="form-check-label" for="booking_date_{{$bookingDate->format('d_m_Y')}}">
                            {{$bookingDate->format('d-m-Y')}}
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="d-flex" style="flex-direction: column;">
    <label for="pickup_drop_check">
        <input type="hidden" name="pick_drop_price" value="{{$pickupDropPrice->value}}">
        <input name="pickup_drop_check" id="pickup_drop_check" type="checkbox">
        I need pickup and drop facility at <strong>INR {{$pickupDropPrice->value}}</strong>.
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

    <button id="proceed-payment" class="btn btn-primary ms-5">Proceed Payment</button>

    <button id="rzp-button1" class="btn btn-primary ms-5 d-none">Pay</button>
</div>

<script>
    const token = "{{ csrf_token() }}";
    var roomDetails = {};
    const maxRoomCount = 2;

    $(function() {
        updateAmount();
        addCompanion(1);

        $('input[name="pickup_drop_check"]').change(function() {
            updateAmount();
        });

        $('input[name="payment"]').change(function() {
            updateAmount();
        });

        $('input[name="room-count"]').change(function() {
            const roomId = parseInt($(this).attr('data-roomid'), 10);
            const roomAmount = parseInt($(this).attr('data-amount'), 10);
            const roomCount = parseInt($(`#room-${roomId}`).val(), 10);

            const selection = {
                id: roomId,
                count: roomCount,
                amount: roomAmount,
            };

            if (roomCount > 0 && roomCount <= maxRoomCount) {
                roomDetails[roomId] = selection;
            } else {
                $(`#room-${roomId}`).val(0);
                delete roomDetails[roomId];

                if (roomCount > maxRoomCount) {
                    Swal.fire({
                        title: 'Invalid room count!',
                        text: `You may select maximum of ${maxRoomCount} rooms.`,
                        icon: 'error',
                    });
                }
            }

            updateAmount();
        });

        $('#accompanying-person-btn-add').click(function() {
            const nextId = $(this).attr('data-nextid');
            addCompanion(nextId);
        });

        $('#proceed-payment').click(function() {
            const amount = updateAmount().total_amount;

            createOrder(amount).then(function(response) {
                $('#proceed-payment').addClass('d-none');
                $('#rzp-button1').removeClass('d-none');

                buildCheckoutLink(response.data);
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
            const id = $(this).attr('data-id');

            deleteAccompanyingPerson(id);
        });

        $('input.booking-date').click(function() {
            updateAmount();
        });
    });

    function getBookingDates() {
        const dates = [];

        $('input.booking-date').each(function() {
            if ($(this).is(':checked')) {
                dates.push($(this).attr('data-date'));
            }
        });

        return dates;
    }

    function getRoomAmount(roomDetails) {
        const rooms = Object.values(roomDetails);

        const unitRoomAmount = rooms
            .reduce((previousValue, currentValue) => previousValue + (currentValue.count * currentValue.amount), 0);

        const bookingDates = getBookingDates();

        return bookingDates.length
            ? unitRoomAmount * bookingDates.length
            : 0;
    }

    function updateAmount() {
        const payerAmount = parseInt(document.querySelector('input[name="payment"]:checked')?.value ?? 0, 10);
        const companionsAmount = getCompanionsTotalAmount();
        const pickUpDropPrice = $('input[name="pickup_drop_check"]:checked').val() ?
            parseInt($('input[name="pick_drop_price"]').val()) :
            0;
        const roomAmount = getRoomAmount(roomDetails);

        console.log({roomAmount});

        let totalAmount = payerAmount + companionsAmount + pickUpDropPrice + roomAmount;

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
            "amount": parseInt(updateAmount().total_amount, 10),
            "currency": "{{$paymentSlabItem->currency}}",
            "name": "Vaicon 2023",
            "description": "Vaicon 2023 conference registration payment",
            "image": "https://www.vaicon2023.com/indicons/images/logo.png",
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
                    'payer_amount': updateAmount().payer_amount,
                    'member_registration_type': $('input[name="payment"]:checked').attr('id'),
                    'pickup_drop': $('input[name="pickup_drop_check"]:checked').val() ? true : false,
                    'airplane_booking': $('input[name="airplane_booking_check"]:checked').val() ? true : false,
                    'payment_title': 'conference_payment',
                    'rooms': Object.values(roomDetails),
                };

                saveConferencePayment(responseData).then(() => {
                    console.log(responseData);
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
                    <button class="btn btn-primary" style="background: blue;" id="person_${number}_confirm">Confirm</button>
                </td>
            </tr>
        `;

        $('#accompanying-person-table').append(markup);
    }
</script>
@stop
