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
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmountInr = 0;
                    $totalAmountUsd = 0;
                @endphp

                @foreach ($payments as $payment)
                    @php
                    if ($payment->currency === 'INR') {
                        $totalAmountInr = $totalAmountInr + $payment->amount;
                    }

                    if ($payment->currency === 'USD') {
                        $totalAmountUsd = $totalAmountUsd + $payment->amount;
                    }
                    @endphp
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$payment->user->name}}</td>
                    <td>{{$payment->user->email}}</td>
                    <td>{{$payment->workshop->name}}</td>
                    <td>{{$payment->displayAmount}}</td>
                    <td>{{$payment->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex" style="justify-content: space-between;">
        <h3>Total Amount (INR): {{currencySymbol('INR')}} {{number_format($totalAmountInr, 2)}}</h3>

        <h3>Total Amount (USD): {{currencySymbol('INR')}} {{number_format($totalAmountUsd, 2)}}</h3>
    </div>
</div>

@stop
