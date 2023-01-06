@extends('layouts.indicons-admin.main-layout')
@section('content')

<style>
    .table td,
    .table thead th {
        font-size: 12px;
    }
</style>

<div class="white-box">
    <div class="d-flex" style="justify-content: space-between; margin-bottom: 1rem;">
        <h3 class="box-title">Registations</h3>

        <a href="{{route('admin.register.page')}}" class="btn btn-primary">Create New</a>
    </div>

    @include('admin.flash-message')

    <div class="container">
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered">
                <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Reg. ID</th>
                        <th class="border-top-0">Name</th>
                        <th class="border-top-0">Phone</th>
                        <th class="border-top-0">Email</th>
                        <th class="border-top-0">Address</th>
                        <th class="border-top-0">Home city pickup + drop</th>
                        <th class="border-top-0">Kolkata pickup + drop</th>
                        <th class="border-top-0">Airplane booking</th>
                        <th class="border-top-0">Stay dates</th>
                        <th class="border-top-0">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$registration->registration_id}}</td>
                        <td>{{$registration->name}}</td>
                        <td>{{$registration->phone}}</td>
                        <td>{{$registration->email}}</td>
                        <td>{{$registration->address}}</td>
                        <td>{{$registration->home_pickup_drop ? 'Yes' : 'No'}}</td>
                        <td>{{$registration->conference_city_pickup_drop ? 'Yes' : 'No'}}</td>
                        <td>{{$registration->airplane_booking ? 'Yes' : 'No'}}</td>
                        <td>{{$registration->stay_dates}}</td>
                        <td>
                            <form name="delete-registration" action="{{route('admin.register.delete', $registration->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const token = "{{ csrf_token() }}";

    $(function() {

    });
</script>

@stop
