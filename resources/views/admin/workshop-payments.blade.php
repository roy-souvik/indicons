@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Workshop Payments</h3>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Email</th>
                    <th class="border-top-0">Workshop</th>
                    <th class="border-top-0">Amount (INR)</th>
                    <th class="border-top-0">Date</th>
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
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$payment->user->name}}</td>
                    <td>{{$payment->user->email}}</td>
                    <td>{{$payment->workshop->name}}</td>
                    <td>{{$payment->amount}}</td>
                    <td>{{$payment->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total Amount: INR {{number_format($totalAmount, 2)}}</h3>
    </div>
</div>

@stop
