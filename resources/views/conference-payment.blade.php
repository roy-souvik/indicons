@extends('layouts.indicons.main-layout')
@section('content')

@php
$maxRoomCount = 2;

$earlyBirdPayable = intval($paymentSlabItem->early_bird_amount) - intval($discounts['early_bird']);
$standardPayable = intval($paymentSlabItem->standard_amount) - intval($discounts['standard']);
$spotPayable = intval($paymentSlabItem->spot_amount) - intval($discounts['spot']);
@endphp

<h4>Registration Fees in {{$paymentSlabItem['currency']}}</h4>

<div id="conference-attributes" style="position: relative;">
    <div id="overlay" class="d-none" style="position: fixed;
    top: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.05);"></div>
    <table class="table">
        <tbody>
            @if ($registrationTypeAuth['is_early_bird'])
            <tr>
                <td>Early Bird Registration</td>
                <td>
                    <input type="radio" id="early_bird" name="payment" checked value="{{$earlyBirdPayable}}">
                    <label for="early_bird">{{$paymentSlabItem->currency}} {{$earlyBirdPayable}}</label>
                </td>
            </tr>
            @endif

            @if ($registrationTypeAuth['is_standard'] && !$registrationTypeAuth['is_early_bird'])
            <tr>
                <td>Standard Registration</td>
                <td>
                    <input type="radio" id="standard" name="payment" value="{{$standardPayable}}">
                    <label for="standard">{{$paymentSlabItem['currency']}} {{$standardPayable}}</label>
                </td>
            </tr>
            @endif

            @if ($registrationTypeAuth['is_standard'] && !$registrationTypeAuth['is_early_bird'])
            <tr>
                <td>Spot Registration</td>
                <td>
                    <input type="radio" id="spot" name="payment" value="{{$paymentSlabItem->spot_amount}}">
                    <label for="spot">{{$paymentSlabItem['currency']}} {{intval($paymentSlabItem->spot_amount) - $discounts['spot']}}</label>
                </td>
            </tr>
            @endif
        </tbody>
    </table>

    <div id="coupon-wrap" class="d-flex" style="justify-content: right; align-items: center;">
        @if (empty($coupon))
            Coupon code:
            <input type="text" id="coupon_code" value="" class="ms-2 form-control" style="width: 10rem;">

            <button class="btn btn-primary ms-2" id="apply_coupon">Apply</button>
        @else
            <div class="text-success" style="background: white;
    padding: 0.4rem;
    border-radius: 1rem;
    font-weight: 700;">
                Coupon code <u>{{$coupon->code}}</u> applied!
            </div>

            <div> <button id="unapply_coupon" class="btn btn-link" style="text-decoration: none; font-size: 1.2rem; font-weight: bold;">x</button></div>
        @endif
    </div>

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
                            <td>{{$room->room_category}}</td>
                            <td style="text-align: right;">
                                Rooms:
                                <input type="number" name="room-count" value="0" id="room-{{$room->id}}" data-roomid="{{$room->id}}" min="0" max="{{$maxRoomCount}}" data-amount="{{$room->amount}}" style="width: 4rem;" />
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
                        <li class="list-group-item">
                            <input name="bookingDate" class="booking-date" type="checkbox" data-date="{{$bookingDate->format('Y-m-d')}}" id="booking_date_{{$bookingDate->format('d_m_Y')}}" />
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
</div>

<br>

<div class="d-flex">
    <h2>
        Total: {{$paymentSlabItem->currency}} <span id="total-amount">0</span>
        <!-- <em class="text-muted" style="font-size: 0.8rem;">18% tax included</em> -->
    </h2>

    <button id="proceed-payment" class="btn btn-primary ms-5" style="z-index: 110;">Proceed Payment</button>

    <button id="rzp-button1" class="btn btn-primary ms-5 d-none" style="z-index: 110;">Pay</button>
</div>

<script>
    const token = "{{ csrf_token() }}";
    var roomDetails = {};
    const maxRoomCount = parseInt("{{$maxRoomCount}}", 10);

    $(function() {
        updateAmount();
        addCompanion(1);

        $('input[name="pickup_drop_check"]').change(function() {
            updateAmount();
        });

        $('input[name="payment"]').change(function() {
            updateAmount();
        });

        $('input[name="room-count"]').change(function(e) {
            e.preventDefault();
            const roomId = parseInt($(this).attr('data-roomid'), 10);
            const roomAmount = parseInt($(this).attr('data-amount'), 10);
            const roomCount = parseInt($(`#room-${roomId}`).val(), 10);

            // Total number of rooms should not be more than `maxRoomCount`
            if (getRoomCount() > maxRoomCount) {
                const message = `
                    You may select maximum of ${maxRoomCount} rooms.
                    For more rooms please contact secratary@vaicon2023.com.
                `;

                showError(message, 'Invalid room count!');

                $(this).val(0);
                delete roomDetails[roomId];

                updateAmount();

                return;
            }

            const selection = {
                id: roomId,
                count: roomCount,
                amount: roomAmount,
            };

            // User should not be able to select more than `maxRoomCount` rooms from each hotel
            if (roomCount > 0 && roomCount <= maxRoomCount) {
                roomDetails[roomId] = selection;
            } else {
                $(`#room-${roomId}`).val(0);
                delete roomDetails[roomId];

                if (roomCount > maxRoomCount) {
                    showError(`You may select maximum of ${maxRoomCount} rooms.`, 'Invalid room count!');
                }
            }

            updateAmount();
        });

        $('#accompanying-person-btn-add').click(function() {
            const nextId = $(this).attr('data-nextid');
            addCompanion(nextId);
        });

        $('#proceed-payment').click(function() {

            if (!validateRoomBooking()) {
                showError('Please select booking date for your rooms.', 'Booking date not selected!');

                return false;
            }

            Swal.fire({
                title: 'Do you want to proceed for payment?',
                text: 'Note: Booking can not be modified again.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    const amount = updateAmount().total_amount;

                    createOrder(amount).then(function(response) {
                        $('#overlay').removeClass('d-none');
                        $('#proceed-payment').addClass('d-none');
                        $('#rzp-button1').removeClass('d-none');

                        buildCheckoutLink(response.data);
                    }, function() {
                        console.log('Some error');
                    });
                }
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

        $('#apply_coupon').click(function() {
            const couponCode = $('#coupon_code').val();

            if (!couponCode?.length || couponCode?.length !== 6) {
                return;
            }

            applyCoupon(couponCode);
        });

        $('#unapply_coupon').click(function () {
            Swal.fire({
                title: 'Remove coupon',
                text: 'Are you sure to remove the coupon?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    unapplyCoupon();
                }
            });

        });
    });

    function unapplyCoupon() {
        $.ajax({
            url: '/unapply-coupon',
            type: 'POST',
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
                showError(`Unable to apply coupon. ${xhr?.responseJSON?.message}`);

                return error;
            },
        });
    }

    function applyCoupon(couponCode) {
        $.ajax({
            url: '/apply-coupon',
            type: 'POST',
            data: JSON.stringify({
                '_token': token,
                coupon_code: couponCode,
            }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            processData: false,
            success: function(result) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Coupon code matched.',
                    icon: 'success',
                }).then(function() {
                    location.reload();
                });

                return result;
            },
            error: function(xhr, status, error) {
                showError(`Unable to apply coupon. ${xhr?.responseJSON?.message}`);

                return error;
            },
        });
    }

    function showError(message = 'Error', title = 'Error!') {
        Swal.fire({
            title: title,
            text: message || 'Error',
            icon: 'error',
        });
    }

    function validateRoomBooking() {
        return getBookingDates().length === 0 && getRoomCount() > 0 ?
            false :
            true
    }

    function getRoomCount() {
        let count = 0;

        $('input[name="room-count"]').each(function() {
            count += parseInt($(this).val());
        });

        return count;
    }

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

        return bookingDates.length ?
            unitRoomAmount * bookingDates.length :
            0;
    }

    function updateAmount() {
        const payerAmount = parseInt(document.querySelector('input[name="payment"]:checked')?.value ?? 0, 10);
        const companionsAmount = getCompanionsTotalAmount();
        const pickUpDropPrice = $('input[name="pickup_drop_check"]:checked').val() ?
            parseInt($('input[name="pick_drop_price"]').val()) :
            0;
        const roomAmount = getRoomAmount(roomDetails);

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
                showError(xhr?.responseJSON?.message);

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
                    'booking_dates': getBookingDates(),
                };

                saveConferencePayment(responseData).then(() => {
                    location.href = '/payment-success?transaction_id=' + response.razorpay_payment_id;
                }, (xhr) => {
                    showError(xhr?.responseJSON?.message);
                });
            },
            "prefill": {
                "name": "",
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

            showError(`Description: ${response.error.description}`, `Error! ${response.error.code}`);
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
                showError(xhr?.responseJSON?.message);

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
