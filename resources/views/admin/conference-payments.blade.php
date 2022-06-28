@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Payments</h3>
    <!-- <p class="text-muted">Add class <code>.table</code></p> -->
    <div class="table-responsive">
        <table class="table text-nowrap">
            <thead>
                <tr>
                    <th class="border-top-0">Reg. ID</th>
                    <th class="border-top-0">Member. ID</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Email</th>
                    <th class="border-top-0">Registration Type</th>
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{$payment->user->registration_id}}</td>
                        <td>{{$payment->user->vaicon_member_id ?? 'N/A'}}</td>
                        <td>{{$payment->user->name}}</td>
                        <td>{{$payment->user->email}}</td>
                        <td>{{$payment->user->role}}</td>
                        <td>${{$payment->amount}}</td>
                        <td>{{$payment->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
