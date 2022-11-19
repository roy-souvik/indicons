@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Sponsorship Categories</h3>

    @include('admin.flash-message')

    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Title</th>
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Number</th>
                    <th class="border-top-0">Color</th>
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
                        <div style="width: 3rem; height: 2rem; background-color: {{$sponsorship->color}};"></div>
                    </td>
                    <td class="d-flex">
                        <a class="btn btn-link" href="{{route('admin.sponsorship.edit', $sponsorship->id)}}">Edit</a>
                        |
                        <a class="btn btn-link" href="/admin/sponsorships/{{$sponsorship->id}}/features">Features</a>
                        |
                        <form name="delete-sponsorship" action="{{route('admin.sponsorship.delete', $sponsorship->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
