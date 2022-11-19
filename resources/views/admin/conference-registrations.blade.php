@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Payments</h3>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">Reg. ID</th>
                    <th class="border-top-0">Member. ID</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Email</th>
                    <th class="border-top-0">Phone</th>
                    <th class="border-top-0">Registration Type</th>
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0">Pickup + Drop</th>
                    <th class="border-top-0">Airplane Booking</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{user->registration_id}}</td>
                        <td>{{user->vaicon_member_id ?? 'N/A'}}</td>
                        <td>{{user->name}}</td>
                        <td>{{user->email}}</td>
                        <td>{{user->phone}}</td>
                        <td>{{user->role}}</td>
                        <td>{{amount}}</td>
                        <td>{{created_at}}</td>
                        <td>{{pickup_drop ? 'Yes' : 'No'}}</td>
                        <td>{{airplane_booking ? 'Yes' : 'No'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
