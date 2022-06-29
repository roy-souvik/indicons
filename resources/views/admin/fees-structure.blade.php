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
                    <th class="border-top-0">Early Bird</th>
                    <th class="border-top-0">Standard</th>
                    <th class="border-top-0">Spot</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $fee)
                <tr>
                    <td>{{$fee->role->name}}</td>
                    <td>{{$fee->currency}}</td>
                    <td>
                        <label for="early_bird_{{$fee->id}}">
                            Regular Amount: <input type="number" id="early_bird_{{$fee->id}}" value="{{$fee->early_bird_amount}}" />
                        </label>

                        <label for="early_bird_member_discount_{{$fee->id}}">
                            Member Discount: <input type="number" id="early_bird_member_discount_{{$fee->id}}" value="{{$fee->early_bird_member_discount}}" />
                        </label>
                    </td>
                    <td>
                        <label for="standard_{{$fee->id}}">
                            Regular Amount: <input type="number" id="standard_{{$fee->id}}" value="{{$fee->standard_amount}}" />
                        </label>

                        <label for="standard_member_discount_{{$fee->id}}">
                            Member Discount: <input type="number" id="standard_member_discount_{{$fee->id}}" value="{{$fee->standard_member_discount}}" />
                        </label>
                    </td>
                    <td>
                        <label for="spot_{{$fee->id}}">
                            Regular Amount: <input type="number" id="spot_{{$fee->id}}" value="{{$fee->spot_amount}}" />
                        </label>

                        <label for="spot_member_discount_{{$fee->id}}">
                            Member Discount: <input type="number" id="spot_member_discount_{{$fee->id}}" value="{{$fee->spot_member_discount}}" />
                        </label>
                    </td>
                    <td style="vertical-align: middle;">
                        <button class="btn btn-primary save-fees" data-feesid="{{$fee->id}}">Save</button>
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

        $('.save-fees').click(function () {
            const feesId = $(this).attr('data-feesid');
            const earlyBirdAmount = $(`#early_bird_${feesId}`).val();
            const earlyBirdMemberDiscount = $(`#early_bird_member_discount_${feesId}`).val();
            const standardAmount = $(`#standard_${feesId}`).val();
            const standardMemberDiscount = $(`#standard_member_discount_${feesId}`).val();
            const spotAmount = $(`#spot_${feesId}`).val();
            const spotMemberDiscount = $(`#spot_member_discount_${feesId}`).val();

            const requestData = {
                '_token': token,
                'id': feesId,
                'early_bird_amount': earlyBirdAmount,
                'early_bird_member_discount': earlyBirdMemberDiscount,
                'standard_amount': standardAmount,
                'standard_member_discount': standardMemberDiscount,
                'spot_amount': spotAmount,
                'spot_member_discount': spotMemberDiscount,
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
