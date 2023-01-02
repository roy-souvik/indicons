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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">User Name</th>
                    <!-- <th class="border-top-0">Image</th> -->
                    <th class="border-top-0">Heading</th>
                    <th class="border-top-0">Theme</th>
                    <th class="border-top-0" style="width: 10rem;">Description</th>
                    <th class="border-top-0">Qualification</th>
                    <th class="border-top-0">Profession</th>
                    <th class="border-top-0">Institution</th>
                    <th class="border-top-0">Confirmed</th>
                    <th class="border-top-0">Created</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abstracts as $abstract)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$abstract->abstract_id}}</td>
                    <td>{{$abstract->user->name}}</td>
                    <!-- <td><img src="/images/{{$abstract->image}}" class="img-thumbnail" alt=""></td> -->
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
        $('.send-abstract').click(async function () {
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

        $(document).on('click', '.copy-description', function() {
            const id = $(this).attr('data-abstractid');
            const description = $('.description-' + id).text();

            copyContent(description);
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
