@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">VAI Members</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Member ID</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Joining Date</th>
                    <th class="border-top-0">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td>{{$member->vai_number}}</td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->date_of_joining}}</td>
                    <td>{{$member->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
