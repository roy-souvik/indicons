@extends('layouts.indicons-admin.main-layout')
@section('content')

<style>
    .table tbody tr {
        font-size: 0.8rem;
    }

    .table thead th {
        font-size: 0.9rem;
        text-align: center;
    }
</style>

<div class="white-box">
    <h3 class="box-title">Payments</h3>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Reg. ID</th>
                    <th class="border-top-0">Member ID</th>
                    <th class="border-top-0">Transaction ID</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Email</th>
                    <th class="border-top-0">Phone</th>
                    <th class="border-top-0">Registration Type</th>
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0">Pickup + Drop</th>
                    <th class="border-top-0">Airplane Booking</th>
                    <th class="border-top-0">Accompanying Persons</th>
                    <th class="border-top-0">Accommodation</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalAmount = 0;
                @endphp
                @foreach ($payments as $payment)
                @php
                $totalAmount = $totalAmount + $payment->amount;
                @endphp
                <tr>
                    <td id="payment-{{$payment->id}}">{{$loop->index + 1}}</td>
                    <td>{{$payment->user->registration_id}}</td>
                    <td>{{$payment->user->vaicon_member_id ?? 'N/A'}}</td>
                    <td>{{$payment->transaction_id ?? 'N/A'}}</td>
                    <td>{{$payment->user->name}}</td>
                    <td>{{$payment->user->email}}</td>
                    <td>{{$payment->user->phone}}</td>
                    <td>{{$payment->user?->role?->name ?? 'N/A'}}</td>
                    <td>{{$payment->amount}}</td>
                    <td>{{$payment->created_at}}</td>
                    <td>{{$payment->pickup_drop ? 'Yes' : 'No'}}</td>
                    <td>{{$payment->airplane_booking ? 'Yes' : 'No'}}</td>
                    <td>
                        <ul>
                            @foreach($payment->user->companions as $companion)
                            <li>
                                Name: {{$companion->getDisplayName()}}; {{$companion->email ?? ''}}
                            </li>
                            @endforeach
                        </ul>

                    </td>

                    <td>
                        <ul>
                            @foreach ($payment->accommodations as $userRoom)
                            <li>
                                {{$userRoom->room->room_category}} - {{$userRoom->room->currency}} {{$userRoom->room->amount}}
                                |
                                Room(s): {{$userRoom->room_count}}
                                |
                                Date: {{$userRoom->booking_date}}
                            </li>
                            @endforeach
                    </td>

                    <td>
                        @if(!empty($payment->transaction_id))
                            <button
                                class="btn btn-link resend-payment-email"
                                data-transactionid="{{$payment->transaction_id}}"
                                data-userid="{{$payment->user->id}}"
                            >
                                Email
                            </button>
                        @endif

                        |

                        <a href="{{route('admin.payment.pdf')}}" target="_blank">PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total Amount: INR {{number_format($totalAmount, 2)}}</h3>
    </div>
</div>

<script>
    const token = "{{ csrf_token() }}";
    $(function() {
        $('.resend-payment-email').click(function() {
            const transactionId = $(this).attr('data-transactionid');
            const userId = $(this).attr('data-userid');

            Swal.fire({
                title: 'Do you want to resend payment confirmation?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    resendConfirmation(userId, transactionId)
                    // const amount = updateAmount().total_amount;

                    // createOrder(amount).then(function(response) {
                    //     $('#overlay').removeClass('d-none');
                    //     $('#proceed-payment').addClass('d-none');
                    //     $('#rzp-button1').removeClass('d-none');

                    //     buildCheckoutLink(response.data);
                    // }, function() {
                    //     console.log('Some error');
                    // });
                }
            });
        });

        function resendConfirmation(userId, transactionId) {
            $.ajax({
                url: "{{route('admin.resend.paymentConfirmation')}}",
                type: 'POST',
                data: JSON.stringify({
                    '_token': token,
                    'txn_id': transactionId,
                    'user_id': userId,
                }),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                processData: false,
                success: function(result) {
                    alert('Email will be sent shortly!');

                    return result;
                },
                error: function(xhr, status, error) {
                    alert ('Error');

                    console.log(xhr);
                    return error;
                },
            });
        }
    });
</script>

@stop
