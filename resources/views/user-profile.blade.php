@extends('layouts.indicons.main-layout')
@section('content')

<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD"></script>

<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 0% !important;
        padding-left: 0px !important;
        border: none !important;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }

    .profile-head li {
        width: inherit !important;
    }

    .btn-primary {
        background: #296dc4 !important;
        color: #fff;

    }

    .delete-person {
        background: red !important;
        color: #fff !important;
    }
</style>

@php
$confirmedCompanions = $user->companions->where('confirmed', 1);
$unconfirmedCompanions = $user->companions->where('confirmed', 0);

function addGst($amount, $gstPercent = 18) {
return $amount + (($amount*$gstPercent)/100);
}

$companionAmount = 0;
$totalCompanionAmount = 0;

if ($accompanyingPersonFees && $paymentSlabItem) {
$amt = intval($accompanyingPersonFees->early_bird_amount);

$companionAmount = $paymentSlabItem->currency != $accompanyingPersonFees->currency
? intval($amt / 75)
: $amt;

$totalCompanionAmount = $unconfirmedCompanions->reduce(function ($carry, $companion) {
return $carry + intval($companion->fees);
}, 0);

$totalCompanionAmount = addGst($totalCompanionAmount);
}

@endphp

<h1>User Profile</h1>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://res.cloudinary.com/demo/image/upload/w_100,h_100,c_thumb,g_face,r_20,d_avatar.png/non_existing_id.png" alt="" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>{{$user->getDisplayName()}}</h5>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add</button>
                        </li> -->

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->getRegistrationIdAttribute()}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->phone}}</p>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->role->name}}</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Add</div>

                    </div>

                </div>
            </div>
        </div>
    </form>

    @if ($confirmedCompanions->count() > 0)
    <br>
    <h5>Confirmed Accompanying Persons</h5>
    <table class="table">
        <tr>
            <td><b>Name</b></td>
            <td><b>Email</b></td>
        </tr>
        @foreach($confirmedCompanions as $key => $person)
        <tr>
            <td>{{$person->name}}</td>
            <td>{{$person->email ?? 'N/A'}}</td>
        </tr>
        @endforeach
    </table>
    @endif

    @if(!$user->isSuperAdmin())
    <br>

    <h5>Add New Accompanying Person</h5>
    <em>
        Fees for each accompanying person is
        <u>{{$paymentSlabItem?->currency}} {{$companionAmount}}</u>
        <input type="hidden" name="companion-amount" id="companion-amount" value="{{$companionAmount}}">
    </em>

    <table class="table" id="accompanying-person-table">

    </table>
    @endif

    @if ($unconfirmedCompanions->count() > 0)
    <br>
    <h5>Unconfirmed Accompanying Persons</h5>
    <table class="table" id="unconfirmed-companions-list">
        <tr>
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach($unconfirmedCompanions as $key => $person)
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

    <p class="text-end">Total amount payable: <b>{{$paymentSlabItem->currency}} {{$totalCompanionAmount}}</b></p>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" style="width: 3rem; margin-bottom: 10rem;"></div>
    @endif
</div>

<script>
    const token = "{{ csrf_token() }}";

    $(function() {
        addCompanion(1);

        $('#person_1_confirm').click(function() {
            const title = $('#person_1_title').val();
            const name = $('#person_1_name').val();
            const email = $('#person_1_email').val();
            const fees = $('#person_1_fees').val();

            createAccompanyingPerson({
                '_token': token,
                title,
                name,
                email,
                fees,
            }).then(function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Accompanying person saved successfully',
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
                        'payer_amount': 0,
                        'companion_amount': "{{$totalCompanionAmount}}",
                        'payment_title': 'addon_companion_payment',
                    };

                    savePaymentDetails(responseData).then(() => {
                        location.href = '/payment-success?transaction_id=' + transaction.id;
                    });
                });
            },
        };

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
                        text: xhr?.responseJSON?.message || 'Saved successfully',
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

        function savePaymentDetails(data) {
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
    });
</script>

@stop
