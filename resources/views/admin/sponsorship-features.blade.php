@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    @include('admin.flash-message')

    <div class="table-responsive">
        <div class="card d-flex">
            <h3>Sponsorship: <u>{{$sponsorship->title}}</u></h3>
            <form name="create-feature" action="{{route('admin.sponsorship.features.create', $sponsorship->id)}}" method="POST">
                @csrf
                <input type="text" placeholder="Add feature" name="title" id="title" value="{{old('title')}}" required>
                <input type="submit" class="btn btn-primary" name="submit" />
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0">Title</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorship->features as $feature)
                <tr>
                    <td>{{$feature->title}}</td>

                    <td>
                        <form name="delete-feature" action="{{route('admin.sponsorship.features.delete', $feature->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
