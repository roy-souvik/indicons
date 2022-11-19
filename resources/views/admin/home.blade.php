@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="grey-box">
    <h3 class="display-6">Home</h3>

    <div class="card" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Conference Registrations</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$registrationCount}}</h6>
            <a href="{{route('admin.conference.payments')}}" class="card-link">View</a>
        </div>
    </div>

    <div class="card" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Conference Abstracts</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$abstractCount}}</h6>
            <a href="{{route('admin.abstracts.show')}}" class="card-link">View</a>
        </div>
    </div>

    <div class="card" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Workshop Registrations</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$workshopRegistrationCount}}</h6>
            <a href="{{route('admin.workshop.payments.show')}}" class="card-link">View</a>
        </div>
    </div>
</div>

@stop
