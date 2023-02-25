@extends('layouts.indicons-admin.main-layout')

@section('content')
<div class="white-box">

    @include('admin.flash-message')

    <div>
        <form action="{{route('media-categories.store')}}" method="post" class="form-horizontal form-material">
            @csrf

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Name</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="name" name="name" maxlength="150" class="form-control p-0 border-0" required>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <h3 class="box-title">Media Categories</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mediaCategories as $mediaCategory)
                        <tr>
                            <td>{{ $mediaCategory->id }}</td>
                            <td>{{ $mediaCategory->name }}</td>
                            <td>{{ $mediaCategory->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <form name="delete-feature" action="{{route('media-categories.destroy', $mediaCategory->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
