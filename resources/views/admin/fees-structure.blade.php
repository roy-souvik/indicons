@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Fees Structure</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Registration Type</th>
                    <th class="border-top-0">Currency</th>
                    <th class="border-top-0">Early Bird Amount</th>
                    <th class="border-top-0">Standard Amount</th>
                    <th class="border-top-0">Spot Amount</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $fee)
                <tr>
                    <td>{{$fee->role->name}}</td>
                    <td>{{$fee->currency}}</td>
                    <td><input type="number" id="early_bird_{{$fee->id}}" value="{{$fee->early_bird_amount}}" /></td>
                    <td><input type="number" id="standard_{{$fee->id}}" value="{{$fee->standard_amount}}" /></td>
                    <td><input type="number" id="spot_{{$fee->id}}" value="{{$fee->spot_amount}}" /></td>
                    <td><button class="btn btn-link save-fees" data-feesid="{{$fee->id}}">Save</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function() {
        const token = "{{ csrf_token() }}";

        $('.save-fees').click(function() {
            const feesId = $(this).attr('data-feesid');
            const earlyBirdAmount = $(`#early_bird_${feesId}`).val();
            const standardAmount = $(`#standard_${feesId}`).val();
            const spotAmount = $(`#spot_${feesId}`).val();

            const requestData = {
                '_token': token,
                'id': feesId,
                'early_bird_amount': earlyBirdAmount,
                'standard_amount': standardAmount,
                'spot_amount': spotAmount,
            };

            saveFees(requestData).then(function () {
                location.reload();
            }, function () {
                alert('Unable to save');
            });
        });

        function saveFees(data) {
            return $.ajax({
                url: '/admin/fees-structure',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                processData: false,
                success: function(result) {
                    return result;
                },
                error: function(xhr, status, error) {
                    return error;
                },
            });
        }
    });
</script>

@stop
