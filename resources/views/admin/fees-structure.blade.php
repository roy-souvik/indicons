@extends('layouts.indicons-admin.main-layout')
@section('content')

<style>
    .table-inputs {
        width: 6rem;
    }
</style>

<div class="white-box">
    <h3 class="box-title">Fees Structure</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0" style="width: 12rem;">Type</th>
                    <th class="border-top-0" style="width: 4rem;">Delegate</th>
                    <th class="border-top-0" style="width: 8rem;">Category</th>
                    <th class="border-top-0 text-center">Amount</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($charges as $charge)

                @php
                $readonly = '';

                if ($charge->role->isCompanion()) {
                $readonly = 'readonly="readonly"';
                }
                @endphp

                <tr>
                    <td>{{$charge->role->name}}</td>
                    <td>{{$charge->delegateType->description}}</td>
                    <td>{{$charge->registrationPeriod->name}}</td>
                    <td class="text-center">
                        <input type="number" id="amount_{{$charge->id}}" value="{{$charge->amount}}" class="table-inputs"/>
                    </td>

                    <td style="vertical-align: middle;">
                        <button class="btn btn-primary save-fees" data-feesid="{{$charge->id}}">Save</button>
                    </td>
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
            const amount = $(`#amount_${feesId}`).val();

            const requestData = {
                '_token': token,
                'id': feesId,
                'amount': amount,
            };

            saveFees(requestData).then(function() {
                location.reload();
            }, function() {
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
