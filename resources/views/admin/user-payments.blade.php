@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="container">
    <h3>User Payments</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Conference Payments</th>
                <th>Workshop Payments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->getDisplayId() }}</td>
                <td>
                    {{ $user->getDisplayName() }}
                    <em>({{ $user->created_at->format('d-m-Y') }})</em>
                </td>

                {{-- Conference Payments --}}
                <td>
                    @if($user->conferencePayments->count())
                        <ul>
                            @foreach($user->conferencePayments as $payment)
                                <li>
                                    Amt: {{ number_format($payment->amount) }} {{ $payment->registrationCharge->currency ?? '' }},
                                    <em class="ml-2">Dt: {{ $payment->created_at->format('d-m-Y') }}</em>,
                                    <em class="ml-2">Txn: {{ $payment->transaction_id }}</em>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <em>No conference payments</em>
                    @endif
                </td>

                {{-- Workshop Payments --}}
                <td>
                    @if($user->workshopPayments->count())
                        <ul>
                            @foreach($user->workshopPayments as $payment)
                                <li>
                                    Amt: {{ number_format($payment->amount) }} {{ $payment->currency ?? '' }},
                                    <em class="ml-2">Dt: {{ $payment->created_at->format('d-m-Y') }}</em>,
                                    <em class="ml-2">Txn: {{ $payment->transaction_id }}</em>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <em>No workshop payments</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
