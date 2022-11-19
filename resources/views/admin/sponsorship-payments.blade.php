@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Sponsorship Payments</h3>

    @include('admin.flash-message')

    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">User</th>
                    <th class="border-top-0">Sponsorship</th>
                    <th class="border-top-0">Transaction ID</th>
                    <th class="border-top-0">Status</th>
                    <th class="border-top-0">Amount (INR)</th>
                    <th class="border-top-0">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorshipPayments as $sponsorshipPayment)
                <tr>
                    <td>{{$sponsorshipPayment->user->name}}</td>
                    <td>{{$sponsorshipPayment->sponsorship->title}}</td>
                    <td>{{$sponsorshipPayment->transaction_id}}</td>
                    <td>{{$sponsorshipPayment->status}}</td>
                    <td>{{$sponsorshipPayment->amount}}</td>
                    <td>{{$sponsorshipPayment->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
