@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Configurations</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Value</th>
                    <th class="border-top-0">Save</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($configList as $config)
                <tr>
                    <td>{{ucfirst(str_replace('_', ' ', $config->name))}}</td>
                    <td>
                        <input type="text" id="config_{{$config->id}}" value="{{$config->value}}">
                    </td>
                    <td>
                        <button class="btn btn-primary save-config" data-configid="{{$config->id}}">Save</button>
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

        $('.save-config').click(function() {
            const configId = $(this).attr('data-configid');
            const configValue = $('#config_' + configId).val();

            const requestData = {
                '_token': token,
                'id': configId,
                'config_value': configValue,
            };

            saveConfig(requestData).then(function() {
                location.reload();
            }, function() {
                alert('Unable to save');
            });
        });

        function saveConfig(data) {
            return $.ajax({
                url: `/admin/configurations/${data.id}`,
                type: 'PUT',
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
