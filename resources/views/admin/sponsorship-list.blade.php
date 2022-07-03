@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Sponsorship Categories</h3>

    @include('admin.flash-message')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Title</th>
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Number</th>
                    <th class="border-top-0" style="text-align: center; width: 15rem;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorships as $sponsorship)
                <tr>
                    <td>{{$sponsorship->title}}</td>
                    <td>{{number_format($sponsorship->amount)}}</td>
                    <td>{{empty($sponsorship->number) ? 'N/A' : $sponsorship->number}}</td>
                    <td>
                        <a class="btn btn-link" href="/admin/sponsorships/{{$sponsorship->id}}/edit">Edit</a>
                        |
                        <a class="btn btn-link" href="/admin/sponsorships/{{$sponsorship->id}}/features">Features</a>
                        |
                        <a class="btn btn-link" href="">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
