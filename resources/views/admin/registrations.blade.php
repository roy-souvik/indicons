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

        <div class="d-flex" style="justify-content: space-between;">

            <input type="date" name="start_date" id="start_date" class="mx-2">

            <input type="date" name="end_date" id="end_date" class="mx-2">

            <button class="btn btn-primary mx-2" id="filter-dates">Filter</button>

            <button class="btn btn-primary mx-2" id="clear-dates">Clear Filter</button>

            <a href="{{route('admin.register.page')}}" class="btn btn-primary mx-2">Create New</a>

            <a class="btn btn-primary" href="{{route('admin.registrations.export')}}" target="_blank">Export Data</a>
        </div>

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
                        <th class="border-top-0">Created date</th>
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
                        <td>{{$registration->created_at->format('Y-m-d')}}</td>
                        <td>
                            <form name="delete-registration" action="{{route('admin.register.delete', $registration->id)}}" method="post" onsubmit="return confirm('Are you sure to delete this user?');">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>

                            <button class="btn btn-primary send-registration-email" data-registrationid="{{$registration->id}}">
                                Send Email
                            </button>
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
        $('.send-registration-email').click(function() {
            const registrationId = $(this).attr('data-registrationid');

            Swal.fire({
                title: 'Do you want to send registration email?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    sendRegistrationEmail(registrationId);
                }
            });
        });

        $('#filter-dates').click(function () {
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();

            if (startDate.length && endDate.length) {
                location.href = "{{route('admin.register.show')}}" + `?st_dt=${startDate}&end_dt=${endDate}`;
            }
        });

        $('#clear-dates').click(function () {
            location.href = "{{route('admin.register.show')}}";
        });

        function sendRegistrationEmail(registrationId) {
            $.ajax({
                url: "{{route('admin.registration.email')}}",
                type: 'POST',
                data: JSON.stringify({
                    '_token': token,
                    'registration_id': registrationId,
                }),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                processData: false,
                success: function(result) {
                    alert('Email will be sent shortly!');

                    return result;
                },
                error: function(xhr, status, error) {
                    alert('Error');

                    console.log(xhr);
                    return error;
                },
            });
        }
    });
</script>

@stop
