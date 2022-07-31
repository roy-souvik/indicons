@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Sponsorship Payments</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorshipPayments as $sponsorshipPayment)
                <tr>
                    <td>{{$sponsorship->title}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
