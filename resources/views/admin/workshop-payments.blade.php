@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <div class="d-flex" style="justify-content: space-between;">
        <h3 class="box-title">Payments</h3>

        <a class="btn btn-primary mb-2" href="{{route('admin.workshop.export')}}" target="_blank">Export Data</a>
    </div>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Email</th>
                    <th class="border-top-0">Workshops</th>
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
                            $totalAmountInr += $payment->amount;
                        }

                        if ($payment->currency === 'USD') {
                            $totalAmountUsd += $payment->amount;
                        }

                        // Fetch only workshops linked to this payment
                        $workshops = $payment->user->workshops;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->user->name }}</td>
                        <td>
                            {{ $payment->user->email }}
                            <br>
                            {{ $payment->user->phone }}
                        </td>
                        <td>
                            @foreach ($workshops as $workshop)
                                <p>
                                    <strong>
                                        {{ $workshop->name }} |
                                        @if ($workshop->venue)
                                            <small>Venue: {{ $workshop->venue }}</small>
                                        @endif
                                    </strong>
                                </p>
                            @endforeach
                        </td>
                        <td>{{ currencySymbol($payment->currency) }} {{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex" style="justify-content: space-between;">
        <h3>Total Amount (INR): {{ currencySymbol('INR') }} {{ number_format($totalAmountInr, 2) }}</h3>
        <h3>Total Amount (USD): {{ currencySymbol('USD') }} {{ number_format($totalAmountUsd, 2) }}</h3>
    </div>
</div>

@stop
