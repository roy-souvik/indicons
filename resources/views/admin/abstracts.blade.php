@extends('layouts.indicons-admin.main-layout')
@section('content')

<style>
    .table td,
    .table thead th {
        font-size: 12px;
    }
</style>

<div class="white-box">
    <h3 class="box-title">Abstracts</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">Heading</th>
                    <th class="border-top-0">Theme</th>
                    <!-- <th class="border-top-0">Co Author</th> -->
                    <th class="border-top-0" style="width: 16rem;">Description</th>
                    <th class="border-top-0">Qualification</th>
                    <th class="border-top-0">Profession</th>
                    <th class="border-top-0">Institution</th>
                    <!-- <th class="border-top-0">Alternate Number</th> -->
                    <th class="border-top-0">Confirmed</th>
                    <th class="border-top-0">Created</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abstracts as $abstract)
                <tr>
                    <td>{{$abstract->abstract_id}}</td>
                    <td>{{$abstract->heading}}</td>
                    <td>{{ucfirst($abstract->theme)}}</td>
                    <td>
                        {{$abstract->description}}
                        <br />
                        <b>Co Author: {{$abstract->co_author ?? 'N/A'}}</b>
                    </td>
                    <td>{{$abstract->qualification}}</td>
                    <td>{{$abstract->profession}}</td>
                    <td>{{$abstract->institution}}</td>
                    <!-- <td>{{$abstract->alternate_number}}</td> -->
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

@stop
