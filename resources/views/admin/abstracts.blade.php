@extends('layouts.indicons-admin.main-layout')
@section('content')

<style>
    .table td,
    .table thead th {
        font-size: 12px;
    }
</style>

<div class="white-box">
    <div class="d-flex" style="justify-content: space-between;">
        <h3 class="box-title">Abstracts</h3>

        <a class="btn btn-primary mb-2" href="{{route('admin.abstract.export')}}" target="_blank">Export Data</a>
    </div>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table no-wrap1 table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">Reg. ID</th>
                    <th class="border-top-0">User Name</th>
                    <th class="border-top-0">Image</th>
                    <th class="border-top-0">Heading</th>
                    <th class="border-top-0">Theme</th>
                    <th class="border-top-0" style="width: 10rem;">Description</th>
                    <th class="border-top-0">Qualification</th>
                    <th class="border-top-0">Profession</th>
                    <th class="border-top-0">Institution</th>
                    <th class="border-top-0">Confirmed</th>
                    <th class="border-top-0">Created</th>
                    <th class="border-top-0">Statements</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abstracts as $abstract)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$abstract->abstract_id}}</td>
                    <td>{{$abstract->user->registration_id}}</td>
                    <td>{{$abstract->user->name}}</td>
                    <td>
                        <img class="img-circle" width="100" src="{{url('images/' . $abstract->image)}}" />
                        <br />

                        <a href="{{url('images/' . $abstract->image)}}" target="_blank">Open Image</a>
                    </td>
                    <td>{{$abstract->heading}}</td>
                    <td>{{ucfirst($abstract->theme)}}</td>
                    <td>
                        <span class="d-none description-{{$abstract->id}}">{{$abstract->description}}</span>
                        <button class="btn btn-link show-description" data-descid="{{$abstract->id}}">show description</button>

                        <button style="margin-top:0.5rem;" class="btn btn-link send-abstract" data-descid="{{$abstract->id}}">send abstract</button>

                        <br />
                        <b>Co Author: {{$abstract->co_author ?? 'N/A'}}</b>
                    </td>
                    <td>{{$abstract->qualification}}</td>
                    <td>{{$abstract->profession}}</td>
                    <td>{{$abstract->institution}}</td>
                    <td>{{$abstract->confirmed ? 'Yes' : 'No'}}</td>
                    <td>{{$abstract->created_at->format('d-m-Y')}}</td>
                    <td>
                        <div class="d-none statements-{{$abstract->id}}">
                            @foreach (explode(',', $abstract->statements) as $statement)
                                <p>{{$statement}}</p>
                            @endforeach
                        </div>
                        <button class="btn btn-link show-statements" data-descid="{{$abstract->id}}">show statements</button>
                    </td>
                    {{-- <td style="text-align: center;">
                        @php
                            $emailLogCount = $abstract->emailLogs->count()
                        @endphp

                        @if ($emailLogCount > 0)
                        <button class="btn btn-link show-log-details" data-abstractid={{$abstract->id}}>
                            {{$emailLogCount}}
                        </button>
                        @else
                        {{$emailLogCount}}
                        @endif
                    </td> --}}
                    <td>

                        <form method="POST" action="{{ route('admin.abstracts.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$abstract->id}}">
                            <input type="hidden" name="confirmed" value={{$abstract->confirmed ? 0 : 1}}>
                            <button type="submit" class="btn btn-link">
                                {{$abstract->confirmed ? 'Un-confirm' : 'Confirm'}}
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    const token = "{{ csrf_token() }}";

    $(function() {
        $('.send-abstract').click(async function() {
            const id = $(this).attr('data-descid');

            const {
                value: email
            } = await Swal.fire({
                title: 'Input email address',
                input: 'email',
                inputLabel: 'Email address',
                inputPlaceholder: 'Enter email address'
            })

            if (email) {
                sendAbstract(id, email);
            }
        });

        $('.show-description').click(function() {
            const id = $(this).attr('data-descid');
            const description = $('.description-' + id).text();

            Swal.fire({
                html: `
                    <p>${description}</p>

                    <a class="copy-description" style="float: right; margin-top: 1rem;" data-abstractid="${id}" href="javascript:void(0);">Copy Description</a>
                `,
            });
        });

        $('.show-statements').click(function() {
            const id = $(this).attr('data-descid');
            const statements = $('.statements-' + id).html();

            Swal.fire({
                html: `
                    <div>${statements}</div>
                `,
            });
        });

        $(document).on('click', '.copy-description', function() {
            const id = $(this).attr('data-abstractid');
            const description = $('.description-' + id).text();

            copyContent(description);
        });

        $('.show-log-details').click(async function () {
            const id = $(this).attr('data-abstractid');
            const logs = await getEmailLogs(id);

            renderEmailLogs(logs.data);
        });
    });

    function sendAbstract(id, email) {
        $.ajax({
            url: "{{route('admin.send.abstract')}}",
            type: 'POST',
            data: JSON.stringify({
                '_token': token,
                'email': email,
                'abstract_id': id,
            }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            processData: false,
            success: function(result) {
                alert('Abstract sent for review.');

                location.reload();

                return result;
            },
            error: function(xhr, status, error) {
                alert(`Unable to send abstract. ${xhr?.responseJSON?.message}`);

                return error;
            },
        });
    }

    function getEmailLogs(abstractId) {
        return $.ajax({
            url: `/admin/abstracts/${abstractId}/email-logs`,
            type: 'GET',
            data: JSON.stringify({
                '_token': token
            }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            processData: false,
            success: function(result) {
                return result;
            },
            error: function(xhr, status, error) {
                alert('Error');
                return error;
            },
        });
    }

    function renderEmailLogs(logs) {
        let output = `
            <div style="display: flex; justify-content: center;">
            <table border="1">
                <thead>
                    <tr>
                        <td style="border: 1px solid #cecece; font-weight: bold; padding: 5px;">Recipient</td>
                        <td style="border: 1px solid #cecece; font-weight: bold; padding: 5px;">IP</td>
                        <td style="border: 1px solid #cecece; font-weight: bold; padding: 5px;">Sent Date</td>
                    </tr>
                </thead>
        `;

        output += '<tbody>';

        logs.forEach(log => {
            const item = `
                <tr>
                    <td style="border: 1px solid #cecece; padding: 5px;">${log.recipient_email}</td>
                    <td style="border: 1px solid #cecece; padding: 5px;">${log.sender_ip}</td>
                    <td style="border: 1px solid #cecece; padding: 5px;">${log.created_at.substring(0, 10)}</td>
                </tr>
            `;

            output += item;
        });

        output += '</tbody></table></div>';

        Swal.fire({html: output});
    }

    function copyContent(text) {
        try {
            navigator.clipboard.writeText(text);

            alert('Description copied successfully!');
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
</script>

@stop
