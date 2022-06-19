@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Abstracts</h3>
    <div class="table-responsive">
        <table class="table text-nowrap">
            <thead>
                <tr>
                    <th class="border-top-0">Heading</th>
                    <th class="border-top-0">Theme</th>
                    <th class="border-top-0">Co Author</th>
                    <th class="border-top-0">Description</th>
                    <th class="border-top-0">Qualification</th>
                    <th class="border-top-0">Profession</th>
                    <th class="border-top-0">Institution</th>
                    <th class="border-top-0">Alternate Number</th>
                    <th class="border-top-0">Confirmed</th>
                    <th class="border-top-0">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abstracts as $abstract)
                    <tr>
                        <td>{{$abstract->heading}}</td>
                        <td>{{$abstract->theme}}</td>
                        <td>{{$abstract->co_author}}</td>
                        <td>{{$abstract->description}}</td>
                        <td>{{$abstract->qualification}}</td>
                        <td>{{$abstract->profession}}</td>
                        <td>{{$abstract->institution}}</td>
                        <td>{{$abstract->alternate_number}}</td>
                        <td>{{$abstract->confirmed ? 'Yes' : 'No'}}</td>
                        <td>{{$abstract->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
