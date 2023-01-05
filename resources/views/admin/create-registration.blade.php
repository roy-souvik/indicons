@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <div class="d-flex" style="justify-content: space-between;">
        <h3 class="box-title">Register an user</h3>
    </div>

    @include('admin.flash-message')

    <div class="container">
        <form action="{{route('admin.register.create')}}" method="post" class="form-horizontal form-material">
            @csrf

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Name</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="name" class="form-control p-0 border-0" value="{{ old('name') }}" required>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Phone</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="phone" class="form-control p-0 border-0" value="{{ old('phone') }}" required>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Email</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="email" class="form-control p-0 border-0" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Address</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="address" class="form-control p-0 border-0" value="{{ old('address') }}" required>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Home Pickup + Drop</label>
                <div class="col-md-12 border-bottom p-0">
                    <select name="home_pickup_drop" id="home_pickup_drop" class="form-control p-0 border-0" required>
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Kolkata Pickup + Drop</label>
                <div class="col-md-12 border-bottom p-0">
                    <select name="conference_city_pickup_drop" id="conference_city_pickup_drop" class="form-control p-0 border-0" required>
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Airplane Booking</label>
                <div class="col-md-12 border-bottom p-0">
                    <select name="airplane_booking" id="airplane_booking" class="form-control p-0 border-0" required>
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Stay Dates</label>
                <div class="col-md-12 border-bottom p-0">
                    <select name="stay_dates[]" id="stay_dates" class="form-control p-0 border-0" multiple required style="height: 8rem;">
                        <option value="2023-01-26">2023-01-26</option>
                        <option value="2023-01-27">2023-01-27</option>
                        <option value="2023-01-28">2023-01-28</option>
                        <option value="2023-01-29">2023-01-29</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const token = "{{ csrf_token() }}";

    $(function() {

    });
</script>

@stop
